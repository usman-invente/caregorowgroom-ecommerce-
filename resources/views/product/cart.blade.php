@extends('layouts.app')
@section('content')
<!--slider-->
<div class="inner-slider-wraper">
  <div class="container">
    <div class="breadcrum-banner-wraper" style="background:url(public/assets/images/breadcrum.jpg) no-repeat top;"> <a href="#"> Home </a> <a href="#"> Cart </a> </div>
  </div>
</div>
<!--slider--> 
<!--content-->
<div class="inner-content-wraper"> 
  
  <!--cart-->
  <div class="cart-main-wraper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-info-main-wraper">
            <h4> Your Cart </h4>
            <div class="table-responsive">
              <table border="0" class="table">
                <tr>
                  <td width="1%" height="58">&nbsp;</td>
                  <td width="54%"><strong>Product</strong></td>
                  <td width="12%"><strong>Price</strong></td>
                  <td width="22%"><strong>Quantity</strong></td>
                </tr>
                <?php $total = 0 ?>
                <?php $sum = 0 ?>
                @if($products)
                @foreach($products as $id => $details)  
                <?php $total = $details['price'] * $details['quantity'] ?>
                <?php $sum = $sum + $total?>
                <tr>
                  <td><a href="#" class="removecart" data-id="{{ $id }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                  <td><div class="image-cart-table" style="background:url({{asset('public/assets/products/'.$details['photo'])}}) no-repeat top;"></div>
                    <h5> {{$details['name']}} </h5></td>
                  <td>{{$details['price']}} </td>
                  <td><div class="input-group table-input-group">
                      <input type="button" value="-" class="count-button button-minus" data-field="quantity">
                      <input type="text" value="{{$details['quantity']}} " min="0" name="quantity[]" size="2" class="quantity-field">
                      <input type="button" value="+" class="count-button button-plus" data-field="quantity">
                    </div></td>
                </tr>

                @endforeach
                @endif
               
              </table>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="addcoupon-code-wraper">
                  <div class="form-group row">
                    <div class="col-md-8">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Coupon Code">
                    </div>
                    <button class="col-md-4">Apply Coupon </button>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="update-cart-button"> <a id="updateCart" href="#"> Update Cart </a> </div>
           
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8"> </div>
        <div class="col-md-4">
          <div class="cart-total-wraper">
            <h4> Cart totals </h4>
            <ul>
              <li> <strong>Subtotal:</strong> <span class="pull-right">${{$sum}}</span> </li>
              <li> <strong>Grand total:</strong> <span class="pull-right">${{$sum}}</span> </li>
            </ul>
            <div class="checkout-button"> <a href="{{route('checkout')}}"> Checkout </a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--cart--> 
  
</div>
<!--content--> 

@endsection