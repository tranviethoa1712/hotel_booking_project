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
                <h3 class="fs-2 font-bolder">Booking Details</h3>
            </div>
            <div class="row mt-5 gap-5 shadow rounded p-3" style="border: 1px solid rgb(80 133 185);">
                <div class="col-md-6 fs-5">
                    <div>
                        <img src="{{url('storage/' . $room->image)}}" alt="">
                    </div>
                    <div class="detail my-3 text-capitalize"><span class="font-bold fs-5">Room Type: </span>{{$room->room_type}}</div>
                    <div class="detail my-3"><span class="font-bold fs-5">Total Price: </span><span style="color: red">{{number_format($booking->total_price)}} VND</span></div>
                    <div class="detail my-3"><span class="font-bold fs-5">Booked rooms: </span>{{$booking->room_quantity}}</div>

                </div>
                <div class="col-md-5">
                    <div class="fs-5">
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Booking code: </span><span>{{$booking->booking_code}}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Full name: </span><span>{{$booking->fullname}}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Email: </span><span>{{$booking->email}}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Address: </span><span>{{$booking->address}}</span></div>
                        @if($booking->city)
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">City: </span><span></span>{{$booking->city}}</div>
                        @endif
                        @if($booking->zip_code)
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Zip/Post Code: </span><span>{{$booking->zip_code}}</span></div>
                        @endif
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Country: </span><span>{{$booking->country}}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Phone number: </span><span>{{$booking->phone_number}}</span></div>
                        @if($booking->special_request)
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Special request: </span><span>{{$booking->special_request}}</span></div>
                        @endif
                        @if($booking->arrival_time)
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Arrival time: </span><span>{{$booking->arrival_time}}</span></div>
                        @endif
                        <div class="detail my-3 d-flex justify-between text-capitalize"><span class="font-bold fs-5">Status: </span><span>{{$booking->status}}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Arrival: </span><span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->start_date)->format('Y.m.d') }}</span></div>
                        <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Departing: </span><span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->end_date)->format('Y.m.d') }}</span></div>
                    </div>

                </div>
            </div>
        </div>
      </div>
     <!-- end result booking  -->
      <!--  footer -->
      @include('home.footer')
   </body>
</html>