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
      <!-- result booking  -->
      <div class="container">
        <div class="p-3">
            <div class="text-center mt-5">
                <h3 class="fs-2 font-bolder">Payment Successfully</h3>
            </div>
            <div class="options mt-5 p-5 border" style="background: palevioletred !important;">
                <div class="title font-bold text-center fs-3" style="color: aliceblue">View booking</div>
                <div class="d-flex justify-center my-5">
                    <<i class="fa-solid fa-check fa-5x" style="color: #dce1ea;"></i>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-5">
                    <a href="{{url('')}}" class="btn font-bold text-view-booking btn-view-booking">Home</a>
                    <a href="{{url('viewBookingDetails', $booking_id)}}" class="btn font-bold ml-3 text-view-booking btn-view-booking">View</a>
                </div>
            </div>
        </div>
      </div>
     <!-- end result booking  -->
      <!--  footer -->
      @include('home.footer')
   </body>
</html>