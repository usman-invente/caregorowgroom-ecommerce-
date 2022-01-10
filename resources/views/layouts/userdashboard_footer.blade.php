 <!-- BEGIN: Footer-->
 <footer class="footer footer-static footer-light">
     <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
         <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
     </p>
 </footer>
 <!-- END: Footer-->

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!-- BEGIN: Vendor JS-->
 <script src="{{asset('public/assets/admin/app-assets/vendors/js/vendors.min.js')}}"></script>
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <script src="{{asset('public/assets/admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->
 <script src="{{asset('public/assets/admin/app-assets/js/core/app-menu.js')}}"></script>
 <script src="{{asset('public/assets/admin/app-assets/js/core/app.js')}}"></script>
 <script src="{{asset('public/assets/admin/app-assets/js/scripts/components.js')}}"></script>
 <!-- END: Theme JS-->

 <!-- BEGIN: Page JS-->
 <script src="{{asset('public/assets/admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
 <!-- END: Page JS-->
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script src="{{ asset('public/assets/admin/app-assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/app-assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/app-assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/app-assets/js/responsive.bootstrap4.min.js') }}"></script>
    @yield('script')
 <script>
     $(document).ready(function() {
         $('#summernote').summernote();
     });
     
 </script>

 </body>
 <!-- END: Body-->

 </html>