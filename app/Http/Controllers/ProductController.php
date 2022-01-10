<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Category;
use App\Models\OrderDeatil;
use Illuminate\Support\Facades\Session;
use DB;
use Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['checkout']]);
    }
    public function productDetail($slug)
    {
         $product = Product::with('images')->where('pr_slug',$slug)->first();
        $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '<>', $product->id)->get();
        return view('product.productDetail', compact('product', 'relatedproducts'));
    }
    public function addproduct(Request $request)
    {
        // $request->session()->forget('cart');
        $id = $request->id;
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        if($category->ca_discount > 0){
         $discount = $category->ca_discount +  $product->pr_discount;
        }else{
            $discount =  $product->pr_discount;
        }
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "product_id" =>  $id,
                    "name" => $product->pr_title,
                    "quantity" => 1,
                    "price" => $product->pr_price,
                    "photo" =>  $product->pr_image,
                    'discount' => $discount,
                    'category_id' =>  $product->category_id
                ]
            ];
            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'count' => count(session('cart'))
            ]);
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            return response()->json([
                'success' => false,
                'message' => 'Product Quanity Updated',
                'count' => count(session('cart'))
            ]);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" =>  $id,
            "name" => $product->pr_title,
            "quantity" => 1,
            "price" => $product->pr_price,
            "photo" =>  $product->pr_image,
            'discount' => $discount,
            'category_id' =>  $product->category_id
        ];
        session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'count' => count(session('cart'))
        ]);
    }

    public function cart()
    {
        $products = session('cart');
        return  view('product.cart', compact('products'));
    }

    public function updateCart(Request $request)
    {
        dd($request->all());
    }

    public function removecart(Request $request)
    {
        try {
            if ($request->id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }

                return response()->json([
                    'success' => true,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function checkout()
    {
        $products = session('cart');
        $user = Order::where('user_id',Auth::user()->id)->first();
        //giving discount on first order
        if(empty($user)){
           $discount = true;
        }else{
            $discount = false;
        }
        return view('product.checkout', compact('products','discount'));
    }

    public function order(Request $request)
    {
        $cart = session()->get('cart');
        if (isset($cart)) {
            $order = new Order;
            $order->fname = $request->fname;
            $order->user_id = Auth::user()->id;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->comment = $request->comment;
            $order->postal_code = $request->postal_code;
            $order->state = $request->state;
            $order->country = $request->country;
            $order->city = $request->city;
            $order->phone = $request->phone;
            $order->second_adress = $request->second_adress;
            $order->company_name = $request->company_name;
            $order->products = json_encode(session()->get('cart'));
            $order->totalbill = $request->totalbill;
            $order->save();
            foreach($cart as $product){
              $orderdetail = new OrderDeatil();
              $orderdetail->order_id =  $order->id;
              $orderdetail->product_id =  $product['product_id'];
              $orderdetail->category_id =  $product['category_id'];
              $orderdetail->quantity =  $product['quantity'];
              $orderdetail->save();
              
            }
            session()->forget('cart');
            return redirect()->back()->with('message', 'Your Order Has Been Placed Successfully');
        } else {
            return redirect()->back()->with('message', 'No Product in cart');
        }
    }

    public function orders()
    {
        return  view('userdashboard.order.allorders');
    }

    public function getAllOrders(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'order_id',
            2 => 'fname',
            3 => 'lname',
            4 => 'email',
            5 => 'phone',
            6 => 'address',
            7 => 'created_at',


        );

        $totalData = Order::where('user_id', Auth::user()->id)->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = Order::where('user_id', Auth::user()->id)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = Order::where('user_id', Auth::user()->id)->orWhere('fname', 'LIKE', "%{$search}%")
                ->orWhere('lname', 'LIKE', "%{$search}%")
                ->orWhere('order_id', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereRaw('DATE_FORMAT(`created_at`, "%d-%m-%Y") LIKE ? ', [$search . '%'])
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Order::where('user_id', Auth::user()->id)->orWhere('fname', 'LIKE', "%{$search}%")
                ->orWhere('lname', 'LIKE', "%{$search}%")
                ->orWhere('order_id', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereRaw('DATE_FORMAT(`created_at`, "%d-%m-%Y") LIKE ? ', [$search . '%'])
                ->count();
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                //$show =  route('admin.order.show', $post->id);
                //$edit = route('offer.edit', $post->id);
                //$delete =  route('admin.user.delete',$post->id);

                $nestedData['id'] = $post->id;
                $nestedData['order_id'] = $post->order_id;
                $nestedData['fname'] = $post->fname;
                $nestedData['lname'] = $post->lname;
                $nestedData['email'] = $post->email;
                $nestedData['phone'] = $post->phone;
                $nestedData['address'] = $post->address;
                $nestedData['created_at'] = date('d-m-Y', strtotime($post->created_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        echo json_encode($json_data);
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('b_slug', $slug)->first();
        return  view('blogdetail', compact('blog'));
    }
    public function productListing($id)
    {
        if (empty($id)) {
            abort(404);
        }
        $products = Product::where('category_id', $id)->get();
        $category = Category::where('id', $id)->first();
        $allcategories = Category::all();
        return view('productslisting', compact('products', 'category', 'allcategories'));
    }

    public function getProductsByCategory(Request $request)
    {
        try {
            $products =  Product::where('category_id', $request->id)->get();
            $category = Category::find($request->id);
            $output = '';
            foreach ($products as $product) {
                $output .= '
                <li class="col-md-3 col-sm-6 col-6">
                <div class="listing-toprated-product"> <a href="' . route('productDetail', $product->pr_slug) . '">
                <div class="listing-toprated-image" style="background:#e9e8e6 url(' . asset('public/assets/products/' . $product->pr_image) . ') no-repeat top center"></div>
                <div class="listing-toprated-text">
                    <h5> ' . $product->pr_title . '</h5>
                    <span> ' . $product->pr_price . ' </span> </div>
                </a> </div>
            </li>';
            }
            return response()->json([
                'success'=> true,
                'data'=> $output,
                'category' => $category->ca_title,
                'category_id' => $category->id
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'Message'=> $th->getMessage()
            ]);
        }
    }

    public function shopbyprice(Request $request){
      
        try {
            $products =  Product::whereBetween('pr_price', [$request->from, $request->to])->where('category_id',$request->id)->get();
            $category = Category::find($request->id);
            $output = '';
            foreach ($products as $product) {
                $output .= '
                <li class="col-md-3 col-sm-6 col-6">
                <div class="listing-toprated-product"> <a href="' . route('productDetail', $product->pr_slug) . '">
                <div class="listing-toprated-image" style="background:#e9e8e6 url(' . asset('public/assets/products/' . $product->pr_image) . ') no-repeat top center"></div>
                <div class="listing-toprated-text">
                    <h5> ' . $product->pr_title . '</h5>
                    <span> ' . $product->pr_price . ' </span> </div>
                </a> </div>
            </li>';
            }
            return response()->json([
                'success'=> true,
                'data'=> $output,
                'category' => $category->ca_title
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=> false,
                'Message'=> $th->getMessage()
            ]);
        }
    }
}
