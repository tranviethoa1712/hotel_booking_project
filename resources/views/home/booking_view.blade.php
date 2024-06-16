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
      </header>
      <!-- end header inner -->
      <!-- end header -->

      {{-- booking --}}
      @include('home.booking');
      {{-- end booking --}}
      
      <!--  footer -->
      @include('home.footer')
      <script src="{{url('js/user/scrollTop.js')}}" type="text/javascript"></script>
      <script src="{{url('js/user/datetime.js')}}" type="text/javascript"></script>
   </body>
</html>