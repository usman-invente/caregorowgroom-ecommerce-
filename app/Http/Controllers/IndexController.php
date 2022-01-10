<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use DB;
use Carbon\Carbon;

class IndexController extends Controller
{
  public function index()
  {
    $topRelatedProducts = Product::orderBy('rating','DESC')->get();
    $featuredProduct = Product::where('pr_featuted',1)->get();
    $categoories = DB::table('order_product')
      ->join('categories', 'categories.id', '=', 'order_product.category_id')
      ->select('categories.*')
      ->whereMonth('order_product.created_at', Carbon::now()->month)
      ->orderBy('order_product.quantity', 'DESC')->get();
    $blog = Blog::orderBy('id', 'DESC')->limit(5)->get();
    return view('index', compact('topRelatedProducts', 'categoories', 'blog','featuredProduct'));
  }

  public function about()
  {
    return view('about');
  }

  public function contact()
  {
    return view('contact');
  }


  public function  ContactEmail(Request $request)
  {
    try {
      \Mail::to('usman.traximtech@gmail.com')->send(new \App\Mail\ContactEmail());
      return redirect()->back('message', 'Email Has Been Sent');
    } catch (\Throwable $th) {
      return redirect()->back('message', 'Something Wrong');
    }
  }
}
