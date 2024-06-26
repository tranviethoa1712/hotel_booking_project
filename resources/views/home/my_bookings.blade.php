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
                <h3 class="fs-2 my-3 text-center">My Bookings</h3>
            </div>
            @foreach ($bookings as $booking)
                <div class="row mt-5 gap-5 shadow rounded p-3" style="border: 1px solid rgb(80 133 185);">
                    <div class="col-md-3 fs-5">
                        <div>
                            <img src="{{url('storage/' . $booking->room->image)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 fs-5" style="color: gray !important;">
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Booking code: </span> {{$booking->booking_code}}
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold text-capitalize">Fullname: </span> {{$booking->fullname}}
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Email: </span> {{$booking->email}}
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Phone number: </span> {{$booking->phone_number}}
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Status: </span> <span class="text-capitalize">{{$booking->status}}</span>
                        </div>
                    </div>
                    <div class="col-md-2 fs-5">
                        <div class="my-3 text-nowrap">
                            <span class="font-bold text-capitalize">Room name: </span> {{$booking->room->room_title}}
                        </div>
                        <div>
                            <span class="font-bold ">Room type: </span> <span class="text-capitalize">{{$booking->room->room_type}}</span>
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Quantity: </span> {{$booking->room_quantity}}
                        </div>
                        <div class="my-3 text-nowrap">
                            <span class="font-bold">Total Price: </span> <span style="color: red">{{number_format($booking->total_price) . ' VND'}}</span>
                        </div>
                    </div>
                    <div class="col-md-2 fs-5 d-flex justify-center align-self-baseline">
                        <div class="p-3">
                            <a class="btn btn-view-details" href="{{url('viewBookingDetails', $booking->id)}}">View details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
     <!-- end result booking  -->
      <!--  footer -->
      @include('home.footer')
   </body>
</html>