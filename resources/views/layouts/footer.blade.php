<!--footer-->
<div class="footer-main-wraper">
  <div class="container">


    <!--subscribe-->
    <div class="subscribe-section-footer">
      <div class="row">


        <div class="col-md-5">
          <h4> Subscribe To Newsletter </h4>
        </div>


        <div class="col-md-7">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Subscribe to our newsletter">
            <button> Subscribe </button>
          </div>
        </div>



      </div>
    </div>
    <!--subscribe-->


    <!--footer botton-->
    <div class="footer-bottom-wraper">
      <div class="row">

        <div class="col-md-3">
          <div class="contact-footer-wraper">
            <h4> Contact us </h4>
            <ul>
              <li> 5013 Berey Town, Landscape Street Washington DC </li>
              <li>contact@company.com </li>
              <li>+001 2233 456</li>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="contact-footer-wraper">
            <h4> Information </h4>
            <ul>
              <li> <a href="{{route('about')}}"> About Us </a> </li>
              <li> <a href="#"> Contact Us </a> </li>
              <li> <a href="#"> Terms & Conditions </a> </li>
              <li> <a href="#"> Privacy Policy </a> </li>
              <li> <a href="#"> Orders And Returns </a> </li>

            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="contact-footer-wraper">
            <h4> Services </h4>
            <ul>
              <li> <a href="{{route('about')}}"> About Us </a> </li>
              <li> <a href="#"> Contact Us </a> </li>
              <li> <a href="#"> Terms & Conditions </a> </li>
              <li> <a href="#"> Privacy Policy </a> </li>
              <li> <a href="#"> Orders And Returns </a> </li>

            </ul>
          </div>
        </div>

        <div class="col-md-3">
          <div class="contact-footer-wraper">
            <h4> Your Account </h4>
            <ul>
              <li> <a href="{{route('about')}}"> About Us </a> </li>
              <li> <a href="#"> Contact Us </a> </li>
              <li> <a href="#"> Terms & Conditions </a> </li>
              <li> <a href="#"> Privacy Policy </a> </li>
              <li> <a href="#"> Orders And Returns </a> </li>

            </ul>
          </div>
        </div>


      </div>
    </div>
    <!--footer botton-->



    <!--copyright-->
    <div class="copyright">
      Copy Right 2021
    </div>
    <!--copyright-->

  </div>
</div>
<!--footer-->




<!-- Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/assets/js/swiper.js')}}"></script> 
<script>
   var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  $('.owl-carousel').owlCarousel({
  loop: true,
  margin: 25,
  nav: true,
  navText: [
    "<i class='fa fa-arrow-left'></i>",
    "<i class='fa fa-arrow-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 2
    }
  }
})
  $("#addToCart").click(function() {
    var id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: "{{route('addproduct')}}",
      data: {
        '_token': "{{csrf_token()}}",
        id: id
      },
      success: function(data) {
        if (data.success == true) {
          $(".cart-badge").text(data.count);
          toastr.success("Product is added in cart");
        }
        if (data.success == false) {
          toastr.info("Product Quanity Updated");
        }
      }
    }); // submitting the form when user press yes
  });

  $("#updateCart").click(function() {
    var quantity = $('.quantity-field').val();
    var id = 1;
    $.ajax({
      type: "POST",
      url: "{{route('updateCart')}}",
      data: {
        '_token': "{{csrf_token()}}",
        quantity: quantity
      },
      success: function(data) {

      }
    }); // submitting the form when user press yes
  });
  $(".removecart").click(function() {
    var id = $(this).data('id');
    $.ajax({
      type: "DELETE",
      url: "{{route('removecart')}}",
      data: {
        '_token': "{{csrf_token()}}",
        id: id
      },
      success: function(data) {
        window.location.reload();
      }
    }); // submitting the form when user press yes
  });
  $(".category").click(function() {
    var id = $(this).data('id');
    $("#loader").show();
    $.ajax({
      type: "GET",
      url: "{{route('getProductsByCategory')}}",
      data: {
        id: id
      },
      success: function(data) {
        $("#loader").hide();
        $("#category_id").val(data.category_id);
        if(data.success){
          if(data.data !=''){
            $('#product-listing').html(data.data);
            $('#category_name').html(data.category);
          
          }else{
            $('#product-listing').html('<span style="margin: 0px auto;margin-top:30px;font-size:20px;">No Product Found</span>');
          }
          
        }else{
          toastr.info("SomeThing Wrong");
          $("#loader").hide();
        }
       
      }
    }); // submitting the form when user press yes
  });
  $(".shopbyprice").click(function() {
    var from = $(this).data('price-from');
    var to = $(this).data('price-to');
    var id = $("#category_id").val();
    $("#loader").show();
    $.ajax({
      type: "GET",
      url: "{{route('shopbyprice')}}",
      data: {
        from: from,
        to : to,
        id: id
      },
      success: function(data) {
        $("#loader").hide();
        if(data.success){
          if(data.data !=''){
            $('#product-listing').html(data.data);
            $('#category_name').html(data.category);
          }else{
            $('#product-listing').html('<span style="margin: 0px auto;margin-top:30px;font-size:20px;">No Product Found</span>');
          }
          
        }else{
          toastr.info("SomeThing Wrong");
          $("#loader").hide();
        }
       
      }
    }); // submitting the form when user press yes
  });
</script>
<!--animation-->
<script>
  AOS.init({
    easing: 'ease-in-quad',
  });
</script>
<!--//animation-->

<!--owl-->
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 25,
    nav: true,
    navText: [
      "<i class='fa fa-arrow-left'></i>",
      "<i class='fa fa-arrow-right'></i>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })
</script>
<!--owl-->

</body>

</html>