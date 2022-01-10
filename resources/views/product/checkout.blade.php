@extends('layouts.app')
@section('content')
<!--content-->
<div class="inner-content-wraper">

    <!--Checkout-->
    <div class="checkout-main-wraper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-form-wraper">
                        <h4> Billing Details </h4>
                        @if (\Session::has('message'))
                        <div class="alert alert-success">
                            {!! \Session::get('message') !!}
                        </div>
                        @endif
                        <form class="row" method="POST" action="{{route('order')}}">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> First Name </label>
                                    <input type="text" class="form-control" name="fname" required placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Last Name </label>
                                    <input type="text" class="form-control" name="lname" required placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Company name (optional) </label>
                                    <input type="text" class="form-control" name="company_name" placeholder="Company name (optional)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address </label>
                                    <input type="text" class="form-control" name="address" required placeholder="Address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Apartment/Suite/Building(Optional) </label>
                                    <input type="text" class="form-control" name="second_adress" placeholder="Apartment/Suite/Building(Optional)">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Phone Number </label>
                                    <input type="text" class="form-control" required name="phone" placeholder="Phone Number(Optional)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City </label>
                                    <input type="text" class="form-control" required name="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country </label>
                                    <input type="text" class="form-control" required name="country" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State/Province(Optional) </label>
                                    <input type="text" class="form-control" name="state" placeholder="State/Province(Optional)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Postal Code </label>
                                    <input type="text" class="form-control" required name="postal_code" placeholder="Postal Code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="boxes">
                                    <input type="checkbox" id="box-1">
                                    <label for="box-1"> My billing address is the same as my shipping address.</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Order Comments </label>
                                    <input type="text" name="comment" class="form-control" placeholder="Order Comments ">
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-right-info-wraper">
                        <h4> Your Order </h4>
                        <div class="order-detail-info-wraper">
                            <ul>
                                <li> <strong>Products:</strong>
                                    <?php $total = 0 ?>
                                    <?php $sum = 0 ?>
                                    <?php $toatalcart = 0 ?>
                                    @if($products)


                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                        </tr>
                                        @foreach($products as $id => $details)
                                      
                                        <?php 
                                        $productdiscount = $details['discount'] / 100 * $details['price'] * $details['quantity'];
                                         $total = $total + $productdiscount;   //total discount
                                         $toatalcart = $toatalcart + $details['price'] * $details['quantity']; //total cart
                                        ?>

                                        <?php $sum = 366  - round($productdiscount);   //total cart price

                                        //apply discount on first order
                                       

                                        ?>
                                        <tr>
                                            <td>{{$details['name']}} </td>
                                            <td> {{$details['price']}}</td>
                                            <td>{{$details['quantity']}}</td>
                                            <td>{{$details['discount']}}%</td>
                                        </tr>
                                        @endforeach
                                    </table>


                                    @endif
                                </li>
                               <?php  $totalbill = $toatalcart -  round($total);
                                if ($discount == true) {
                                    $totalafterdiscount  = (10 / 100) * $totalbill;
                                }
                               ?>
                                <li> <strong>Subtotal:</strong> <span> ${{ round($totalbill)}} </span> </li>
                                <!-- <li> <strong>Shipping:</strong> <span> Lorem lipsum dollar dummy </span> </li> -->
                                @if($discount == true)
                                <li> <strong>Discount:</strong> <span> 10% first order discount </span> </li>
                                <li> <strong>Total:</strong> <span> ${{ round($totalafterdiscount)}} </span></li>
                                @else
                                <li> <strong>Total:</strong> <span> ${{ round($totalbill)}} </span></li>
                                @endif
                            </ul>

                            <div class="form-button-wraper">
                                <div class="pay-button-wraper">
                                    <input type="hidden" value="{{$totalbill}}" name="totalbill" >
                                    <input type="submit" value="Checkout" style="cursor:pointer" class="paypal-button">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!--Checkout-->

</div>
<!--content-->
@endsection