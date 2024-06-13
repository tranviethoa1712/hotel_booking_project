<!DOCTYPE html>
<html lang="en">
   <head>
      @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('home.header')
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <!--  coupon -->
      @include('home.coupon')
      <!-- end coupon -->
      <!--  footer -->
      @include('home.footer')
      <script src="{{url('js/user/coupon.js')}}" type="text/javascript"></script>
   </body>
</html>