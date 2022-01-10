@extends('layouts.app')
@section('content')
<!--content-->
<div class="inner-content-wraper"> 
  
  <!--cart-->
  <div class="contact-main-wraper">
    <div class="container">
      <div class="contact-map-wraper">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30596698663!2d-74.25986773739224!3d40.697149413874705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1613293517214!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
    <div class="contact-form-location-wraper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="contact-form-wraper">
              <h4> Contact Form </h4>
              @if (\Session::has('message'))
                <div class="alert alert-success">
                    {!! \Session::get('message') !!}
                </div>
                @endif
              <form class="row" method="post" action="{{route('contactus')}}">
                  @csrf
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" name="fname" class="form-control" placeholder="First Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="lname" placeholder="Last Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="phone" placeholder="Phone Number">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="textarea-group">
                    <textarea class="form-control" rows="7" name="message" placeholder="Your Message"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="contact-button">
                    <button> Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--cart--> 
  
</div>
<!--content--> 
@endsection