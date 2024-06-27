<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
     {{-- Header --}}
    @include('admin.header')
    {{-- end Header --}}
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
      <!-- result booking  -->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="p-3">
                <div class="text-center mt-5">
                    <h3 class="fs-2 font-bolder">Booking Details</h3>
                </div>
                <div class="row mt-5 gap-5 shadow rounded p-3" style="border: 1px solid red;">
                    <div class="col-md-6 fs-5">
                        <div class="w-100">
                            <img src="{{url('storage/' . $booking->room->image)}}" alt="" class="w-100">
                        </div>
                        <div class="detail my-3 text-capitalize"><span class="font-bold fs-5">Room Type:&nbsp; </span>{{$booking->room->room_type}}</div>
                        <div class="detail my-3"><span class="font-bold fs-5">Total Price:&nbsp;</span><span style="color: red">{{number_format($booking->total_price)}} VND</span></div>
                        <div class="detail my-3"><span class="font-bold fs-5">Booked rooms:&nbsp; </span>{{$booking->room_quantity}}</div>

                    </div>
                    <div class="col-md-5"> &nbsp;
                        <div class="fs-5">
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Booking code: &nbsp; </span><span>{{$booking->booking_code}}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Full name: &nbsp; </span><span>{{$booking->fullname}}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Email: &nbsp; </span><span>{{$booking->email}}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Address: &nbsp; </span><span>{{$booking->address}}</span></div>
                            @if($booking->city)
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">City: &nbsp; </span><span></span>{{$booking->city}}</div>
                            @endif
                            @if($booking->zip_code)
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Zip/Post Code: &nbsp; </span><span>{{$booking->zip_code}}</span></div>
                            @endif
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Country: &nbsp; </span><span>{{$booking->country}}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Phone number: &nbsp; </span><span>{{$booking->phone_number}}</span></div>
                            @if($booking->special_request)
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Special request: &nbsp; </span><span>{{$booking->special_request}}</span></div>
                            @endif
                            @if($booking->arrival_time)
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Arrival time: &nbsp; </span><span>{{$booking->arrival_time}}</span></div>
                            @endif
                            <div class="detail my-3 d-flex justify-between text-capitalize"><span class="font-bold fs-5">Status: &nbsp; </span><span>{{$booking->status}}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Arrival: &nbsp; </span><span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->start_date)->format('Y.m.d') }}</span></div>
                            <div class="detail my-3 d-flex justify-between"><span class="font-bold fs-5">Departing: &nbsp; </span><span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->end_date)->format('Y.m.d') }}</span></div>
                        </div>

                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
     <!-- end result booking  -->
      <!--  footer -->
      @include('admin.footer')
    </body>
  </html>