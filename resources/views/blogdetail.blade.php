@extends('layouts.app')
@section('content')
<!--content-->
<div class="inner-content-wraper">

    <!--blog-->
    <div class="blog-detail-wraper">
        <div class="container">
            <div class="blog-detail-image" style="background:url({{asset('public/assets/blogs/'.$blog->b_image)}}) no-repeat top;"></div>
            {!!$blog->b_description!!}




        </div>
    </div>
    <!--blog-->

</div>
<!--content-->
@endsection