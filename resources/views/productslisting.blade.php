@extends('layouts.app')
@section('content')
<!--content-->
<div class="inner-content-wraper">


    <!--Filters & product-->
    <div class="filter-and-product-main-wraper">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="filters-product-wraper">
                        <h2> All Categories </h2>
                        <ul>
                            @foreach($allcategories as $cat)
                            <li> <a class="category"  style="cursor:pointer" data-id="{{$cat->id}}"> {{$cat->ca_title}} <i class="fa fa-angle-right" aria-hidden="true"></i> </a> </li>
                            @endforeach

                        </ul>
                        <h2> Shop By Price </h2>
                        <ul>
                            <li> <a class="shopbyprice" data-price-from="0" data-price-to="279"> $0.00 - $279.00 </a> </li>
                            <li> <a class="shopbyprice" data-price-from="279" data-price-to="555"> $279.00 - $555.00 </a> </li>
                            <li> <a class="shopbyprice" data-price-from="555" data-price-to="832"> $555.00 - $832.00 </a> </li>
                            <li> <a class="shopbyprice" data-price-from="832" data-price-to="1108"> $832.00 - $1,108.00 </a> </li>
                            <li> <a class="shopbyprice" data-price-from="1108" data-price-to="1385"> $1,108.00 - $1,385.00 </a> </li>
                            <input type="hidden"  id ="category_id" name="category_id" value="{{$category->id}}">
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="right-product-category-wraper">
                        <div class="sub-category-wraper">
                            <h3> Other Categories </h3>
                            <div class="carousel-wrap">
                                <div class="owl-carousel">

                                    <div class="item">
                                        <div class="sub-category-list-wrp"> <a href="#" style="background:url(images/sub-category-image1.jpg) no-repeat top;"> Joggers </a> </div>
                                    </div>

                                    <div class="item">
                                        <div class="sub-category-list-wrp"> <a href="#" style="background:url(images/sub-category-image2.jpg) no-repeat top;"> Lightweight </a> </div>
                                    </div>
                                    <div class="item">
                                        <div class="sub-category-list-wrp"> <a href="#" style="background:url(images/sub-category-image3.jpg) no-repeat top;"> Standard </a> </div>
                                    </div>
                                    <div class="item">
                                        <div class="sub-category-list-wrp"> <a href="#" style="background:url(images/sub-category-image4.jpg) no-repeat top;"> Travel Systems </a> </div>
                                    </div>
                                    <div class="item">
                                        <div class="sub-category-list-wrp"> <a href="#" style="background:url(images/sub-category-image5.jpg) no-repeat top;"> Wagons </a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-lisitng-grid-list-wraper">
                            <div class="gird-list-tabpanel-heading-wraper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 id="category_name"> {{$category->ca_title}} </h5>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>
                            <div class="top-rated-product-wraper">
                                <ul class="row" id="product-listing">
                                    @foreach($products as $product)
                                    <li class="col-md-3 col-sm-6 col-6">
                                        <div class="listing-toprated-product"> <a href="{{route('productDetail',$product->pr_slug)}}">
                                                <div class="listing-toprated-image" style="background:#e9e8e6 url({{asset('public/assets/products/'.$product->pr_image)}}) no-repeat top center"></div>
                                                <div class="listing-toprated-text">
                                                    <h5> {{$product->pr_title}} </h5>
                                                    <span> {{$product->pr_price}} </span>
                                                </div>
                                            </a> </div>
                                    </li>
                                    @endforeach
                                    <!-- loader-->
                                   
                                </ul>
                                <img  id="loader" style="position: absolute;bottom: 166px;left: 368px;display:none" src="{{asset('public/assets/images/Spinner.gif')}}">
                                <!-- <div class="pagination-wraper"> <a href="#"> 1 </a> <a href="#"> 2 </a> <a href="#"> 3 </a> <a href="#"> 4 </a> <a href="#"> 5 </a> </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Filters & product-->



</div>
<!--content-->
@endsection