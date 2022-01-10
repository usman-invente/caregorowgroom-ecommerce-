@extends('layouts.app')
@section('content')
<!--slider-->
<div class="inner-slider-wraper">
    <div class="container">
        <div class="breadcrum-banner-wraper" style="background:url(public/assets/images/breadcrum.jpg) no-repeat top;"> <a href="#"> Home </a> <a href="#"> Strollers & Accessories </a> <a href="#"> Hummingbird printed t-shirt </a> </div>
    </div>
</div>
<!--slider-->

<!--content-->
<div class="inner-content-wraper">


    <!--product detail-->
    <div class="product-detail-main-wraper">
        <div class="container">

            <!--product top-->
            <div class="product-top-section-wrp">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Swiper -->
                        <div class="swiper gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                <div class="swiper-slide" style="background:url({{asset('public/assets/products/'.$image->image)}}) no-repeat center center; background-size:contain;"></div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                <div class="swiper-slide" style="background:url({{asset('public/assets/products/'.$image->image)}}) no-repeat center center; background-size:contain;"></div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="product-text-detail-wraper">
                            <h1> {{$product->pr_title}} </h1>
                            <div class="star-review-rating"> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <a href="#"> Read reviews (1) </a> </div>
                            <div class={{$product->pr_saleprice ?'amount-wraper':''}}> <span> {{$product->pr_price}} </span>
                                @if($product->pr_saleprice)
                                <strong> {{$product->pr_saleprice}} </strong>
                                @endif
                            </div>
                            <div class="input-group">
                                <label> Quantity </label>
                                <input type="button" value="-" class="count-button button-minus" data-field="quantity">
                                <input type="text" value="1" min="0" name="quantity" size="2" class="quantity-field">
                                <input type="button" value="+" class="count-button button-plus" data-field="quantity">
                            </div>
                            <div class="stock-avalialblitiy">
                                <ul>
                                    <li><strong>Availability:</strong> {{$product->pr_availability}} </li>
                                    <li><strong>Brand:</strong> {{$product->pr_brand}}</li>
                                    <li><strong>SKU:</strong> {{$product->pr_sku}} </li>
                                    <li><strong>Condition:</strong> {{$product->pr_condition}} </li>
                                    <li><strong>Shipping:</strong> Calculated at Checkout </li>
                                </ul>
                            </div>
                            <div class="addtocart-buttons-wishlist"> <a id="addToCart" style="cursor:pointer" data-id="{{$product->id}}" class="addto-cart-button" data-toggle="modal" data-target="#myModal"> Add to Cart </a> <a href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist </a> </div>
                            <div class="great-reson-buy">
                                <h4> 4 Great reasons to buy from us: </h4>
                                <div class="image-buy"> <img src="{{asset('public/assets/images/cards.png')}}" alt="card"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product top-->

            <!--product text-->
            <div class="product-info-tabs-wraper">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    <li><a data-toggle="tab" href="#menu1">Specification</a></li>
                    <li><a data-toggle="tab" href="#menu2"> Show Reviews <span> (1)</span></a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active show">
                        {!!$product->pr_description!!}
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="stock-avalialblitiy">
                            <ul class="row">
                                <li class="col-md-4">
                                    <div class="listing-stock-wrp"> <strong>Availability:</strong> {{$product->pr_availability}} </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="listing-stock-wrp"><strong>Brand:</strong> {{$product->pr_brand}} </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="listing-stock-wrp"><strong>SKU:</strong>{{$product->pr_sku}} </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="listing-stock-wrp"><strong>Condition:</strong> {{$product->pr_condition}} </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="review-listing-wraper">
                            <ul>
                                <li>
                                    <div class="lisitng-review-wrp">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="review-star-wraper">
                                                    <div class="star-review-rating"> <strong> Grade </strong> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span>
                                                        <p> demo demo 08/23/2020 </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="listing-review-text">
                                                    <h4> John Smith </h4>
                                                    <p> PageMaker including versions of Lorem Ipsum. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lisitng-review-wrp">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="review-star-wraper">
                                                    <div class="star-review-rating"> <strong> Grade </strong> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span>
                                                        <p> demo demo 08/23/2020 </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="listing-review-text">
                                                    <h4> John Smith </h4>
                                                    <p> PageMaker including versions of Lorem Ipsum. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="lisitng-review-wrp">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="review-star-wraper">
                                                    <div class="star-review-rating"> <strong> Grade </strong> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span> <span> <i class="fa fa-star" aria-hidden="true"></i> </span>
                                                        <p> demo demo 08/23/2020 </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="listing-review-text">
                                                    <h4> John Smith </h4>
                                                    <p> PageMaker including versions of Lorem Ipsum. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--product text-->

        </div>
    </div>
    <!--product detail-->


    <!--related product-->
    <div class="container">
        <div class="product-related-main-wraper">
            <h3> Related Product </h3>

            <div class="top-rated-product-wraper">
                <ul class="row">
                    @foreach($relatedproducts as $product)
                    <li class="col-md-3 col-sm-6 col-6">
                        <div class="listing-toprated-product"> <a href="{{route('productDetail',$product->pr_slug)}}">
                                <div class="listing-toprated-image" style="background:#e9e8e6 url({{asset('public/assets/products/'.$product->pr_image)}}) no-repeat top center"></div>
                                <div class="listing-toprated-text">
                                    <h5> {{$product->pr_title}}</h5>
                                    <span> {{$product->pr_price}}</span>
                                </div>
                            </a> </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <!--related product-->
</div>
<!--content-->
@endsection