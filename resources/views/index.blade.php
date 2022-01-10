@extends('layouts.app')
@section('content')
        <!--category, nav-->
        <div class="category-nav-main-wraper">
            <div class="row">
                <div class="col-md-4">
                    <div class="header-category-button"> <a href="#"> <i class="fa fa-bars" aria-hidden="true"></i> SHOP BY CATEGORY </a> </div>
                </div>
                <div class="col-md-8">
                    <div class="header-nav-wraper">
                        <ul>
                            <li><a href="#"> Home </a></li>
                            <li><a href="#"> Shop </a></li>
                            <li><a href="#"> Product </a></li>
                            <li><a href="#"> Sale </a></li>
                            <li><a href="#"> Blog </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--category, nav-->

    </div>
    <!--header-->

</div>
<!--header-->

<!--slider-->
<div class="slider-main-wraper">
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider-main-wraper" style="background:url(public/assets/images/slider-image1.jpg) no-repeat top;">
                        <div class="slider-text-wraper"> <strong> BABY FASHION </strong>
                            <h2> Upto 20% Off </h2>
                            <p> Check out sweet summer collection<br>
                                inspired by the lorem lipsum. </p>
                            <div class="button-slider-shop"> <a href="#"> Shop Now </a> </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-main-wraper" style="background:url(public/assets/images/slider-image1.jpg) no-repeat top;">
                        <div class="slider-text-wraper"> <strong> BABY FASHION </strong>
                            <h2> Upto 20% Off </h2>
                            <p> Check out sweet summer collection<br>
                                inspired by the lorem lipsum. </p>
                            <div class="button-slider-shop"> <a href="#"> Shop Now </a> </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-main-wraper" style="background:url(public/assets/images/slider-image1.jpg) no-repeat top;">
                        <div class="slider-text-wraper"> <strong> BABY FASHION </strong>
                            <h2> Upto 20% Off </h2>
                            <p> Check out sweet summer collection<br>
                                inspired by the lorem lipsum. </p>
                            <div class="button-slider-shop"> <a href="#"> Shop Now </a> </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
        </div>
    </div>
</div>
<!--slider-->

<!--content-->
<div class="content-main-wraper">
    <div class="container">

        <!--advantages-->
        <div class="advantages-main-wraper">
            <ul class="row">
                <li class="col-md-3">
                    <div class="advantage-listing-wrap">
                        <div class="advantage-listing-image" style="background:url(public/assets/images/advantage-image1.jpg) no-repeat top;"></div>
                        <div class="advantage-listing-text">
                            <h2> Free Delivery </h2>
                            <p> For all order over $100 </p>
                        </div>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="advantage-listing-wrap">
                        <div class="advantage-listing-image" style="background:url(public/assets/images/advantage-image2.jpg) no-repeat top;"></div>
                        <div class="advantage-listing-text">
                            <h2> 90 Days Return </h2>
                            <p> If goods have problems </p>
                        </div>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="advantage-listing-wrap">
                        <div class="advantage-listing-image" style="background:url(public/assets/images/advantage-image3.jpg) no-repeat top;"></div>
                        <div class="advantage-listing-text">
                            <h2> Secure Payment </h2>
                            <p> 100% sercure payment </p>
                        </div>
                    </div>
                </li>
                <li class="col-md-3">
                    <div class="advantage-listing-wrap">
                        <div class="advantage-listing-image" style="background:url(public/assets/images/advantage-image4.jpg) no-repeat top;"></div>
                        <div class="advantage-listing-text">
                            <h2> 24/7 Support </h2>
                            <p> Dedicated support </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--advantages-->

        <!--category-->
        <div class="category-listing-wraper">
            <h3> Top Categories of the Month </h3>
            <ul class="row">
                @foreach($categoories->unique() as $cat)
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url({{asset('public/assets/categories/'.$cat->ca_image)}}) no-repeat top"></div>
                            <h4> {{$cat->ca_title}} </h4>
                        </a> </div>
                </li>
                @endforeach
                <!-- <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image2.jpg) no-repeat top"></div>
                            <h4> Baby Boy </h4>
                        </a> </div>
                </li>
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image3.jpg) no-repeat top"></div>
                            <h4> Family Look </h4>
                        </a> </div>
                </li>
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image4.jpg) no-repeat top"></div>
                            <h4> Maternity </h4>
                        </a> </div>
                </li>
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image5.jpg) no-repeat top"></div>
                            <h4> Maternity </h4>
                        </a> </div>
                </li>
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image6.jpg) no-repeat top"></div>
                            <h4> Accessories </h4>
                        </a> </div>
                </li>
                <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image7.jpg) no-repeat top"></div>
                            <h4> Toddler Girl </h4>
                        </a> </div>
                </li> -->
                <!-- <li class="col-md-3">
                    <div class="category-list-wrap"> <a >
                            <div class="category-list-image" style="background:url(public/assets/images/category-image8.jpg) no-repeat top"></div>
                            <h4> Toddler Boy </h4>
                        </a> </div>
                </li> -->
            </ul>
        </div>
        <!--category-->

        <!--call action-->
        <div class="call-action-main-wraper">
            <ul class="row">
                <li class="col-md-6">
                    <div class="listing-call-action"> <a > <img src="{{asset('public/assets/images/call-action-image1.jpg')}}" alt="call-action"> </a> </div>
                </li>
                <li class="col-md-6">
                    <div class="listing-call-action"> <a > <img src="{{asset('public/assets/images/call-action-image2.jpg')}}" alt="call-action"> </a> </div>
                </li>
            </ul>
        </div>
        <!--call action-->

        <!--top rated-->
        <div class="top-rated-product-wraper">
            <h3> Top Rated Products </h3>
            <ul class="row">
                @foreach($topRelatedProducts as $product)
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
        <!--top rated-->

        <!--call action-->
        <div class="baby-call-to-action-wraper">
            <div class="row">

                <div class="col-md-7">
                    <div class="baby-call-to-action-image" style="background:url(public/assets/images/baby-image1.jpg) no-repeat top;"> </div>
                </div>


                <div class="col-md-5">
                    <div class="baby-text-cart-wraper">
                        <h2> Lorem lipsum dollar </h2>
                        <span> Kid $500 </span>

                        <div class="color-pallete">
                            <h4> Classics: Natural Black </h4>
                            <a href="#" style="background:#000000"> </a>
                            <a href="#" style="background:#434343"> </a>

                        </div>

                        <div class="color-pallete">
                            <h4> Limited Editon </h4>
                            <a href="#" style="background:#eb8e87"> </a>
                            <a href="#" style="background:#00326b"> </a>

                        </div>

                        <div class="size-quantity-form">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Size </label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Qty </label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="add-tocart-button"> <a href="#"> Add to Cart </a> </div>

                    </div>
                </div>




            </div>
        </div>
        <!--call action-->

        <!--Featured Product-->
        <div class="top-rated-product-wraper">
            <h3> Featured Product </h3>
            <ul class="row">
                @foreach($featuredProduct as $product)
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
        <!--Featured Product-->

        <!--call action-->
        <div class="call-action-main-wraper">
            <ul class="row">
                <li class="col-md-6">
                    <div class="listing-call-action"> <a > <img src="{{asset('public/assets/images/callaction4.jpg')}}" alt="call-action"> </a> </div>
                </li>
                <li class="col-md-6">
                    <div class="listing-call-action listing-call-action-two"> <a  > <img src="{{asset('public/assets/images/callaction5.jpg')}}" alt="call-action"> </a> </div>
                    <div class="listing-call-action listing-call-action-two"> <a  > <img src="{{asset('public/assets/images/callaction6.jpg')}}" alt="call-action"> </a> </div>
                </li>
            </ul>
        </div>
        <!--call action-->

        <!--Read Our Latest News-->
        <div class="latest-new-main-wraper">
            <h3> Read Our Latest News </h3>
            <ul class="row">
                @foreach($blog as $blog)
                <li class="col-md-4 col-sm-6 col-6">
                    <div class="latest-new-listing"> <a  href="#">
                            <div class="latest-new-image" style="background:url({{asset('public/assets/blogs/'.$blog->b_image)}}) no-repeat top"></div>
                            <div class="latest-new-text"> <span> SUB CATEGORY </span>
                                <h5> {{$blog->b_title}}</h5>
                                <strong><a href="{{route('blogDetail',$blog->b_slug)}}">Read More</a> </strong>
                            </div>
                        </a> </div>
                </li>

            @endforeach
                
            </ul>
        </div>
        <!--Read Our Latest News-->

    </div>
</div>
<!--content-->
@endsection