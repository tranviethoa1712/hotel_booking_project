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
      <div  class="our_room">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>{{__('home.room_details.title')}}</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
           <div class="row">
             <div class="col-md-12 mb-4">
                <div id="serv_hover " style="width: 100%; height: 100%;"  class="room">
                   <div class="room_img p-5">
                      <figure><img src="{{url('storage/' . $room->image)}}" style="width: 100%;" class="card-img-top img-fluid" alt="room"/></figure>
                   </div>
                   <div class="bed_room">
                      <h3 class="fs-2">{{$room->room_title}}</h3>
                      <p class="card-text mt-4 mb-3 fs-4">{!! Str::limit($room->description, 100) !!}</p>
                      <h4 class="fs-4">{{__('home.room_details.free_wifi')}} {{ $room->wifi }}</h4>
                      <h4 class="fs-4">{{__('home.room_details.room_type')}} {{ $room->room_type }}</h4>
                      <p class="fs-3">{{__('home.room_details.price')}} <span style="color: rgb(234, 60, 60)">{{ number_format($room->price) . ' VND' }}</span> for 1 night.</p>
                      <p class="priceChange"></p>
                   </div>
                </div>
             </div>
             <div class="col-md-12">
               <h2 class="font-bold text-center fs-2">Availability</h2>
               <div class="my-4 d-flex">
                  <div class="form-group">
                        <label class="">{{__('home.room_details.start_date_lable')}}</label>
                        <input class="form-control" type="date" name="start_date" id="startDate" value="{{old('start_date')}}">
                  </div>
                  <div class="form-group">
                        <label class="">{{__('home.room_details.end_date_lable')}}</label>
                        <input class="form-control" type="date" name="end_date" id="endDate" value="{{old('end_date')}}">
                     </div>
                  <div class="form-group d-flex align-items-end">
                     <button type="button" class="btn btn-primary" id="change-search">Change search</button>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-10 p-0">
                     <table class="table table-available-room">
                        <thead>
                          <tr>
                            <th scope="col" class="table-header-cell" ">Room Type</th>
                            <th scope="col" class="table-header-cell" table-header-cell">Number of guests</th>
                            <th scope="col" class="table-header-cell-point"><div id="priceForNights">Price for 2 nights</div></th>
                            <th scope="col" class="table-header-cell" table-header-cell">Your choices</th>
                            <th scope="col" class="table-header-cell" table-header-cell">Select rooms</th>
                          </tr>
                        </thead>
                        <tbody id="tableBody">
                           @if(!empty($rooms))
                              @foreach($rooms as $room)
                              <tr>
                                <td style="width: 33%">
                                  <span class="text-capitalize font-bold underline fs-3" style="color: cadetblue">{{$room->room_type}}</span>
                                  <div class="mt-3">
                                     <div class="font-weight-light">
                                        <i class="fa-solid fa-house"></i> 23 m² &nbsp;  <i class="fa-solid fa-temperature-arrow-up"></i> Air conditioning <br/>
                                        <i class="fa-solid fa-bath"></i> Private bathrooms &nbsp; <i class="fa-solid fa-tv"></i> Flat-screen <br/> 
                                        <i class="fa-solid fa-volume-xmark"></i> TV Soundproofing &nbsp; <i class="fa-solid fa-wifi"></i> Free WiFi
                                     </div>
                                     <hr class="my-4">
                                     <div>
                                           <i class="fa-solid fa-check"></i> Shower
                                           &nbsp; <i class="fa-solid fa-check"></i> Safety deposit box 
                                           &nbsp; <i class="fa-solid fa-check"></i> Free toiletries
                                           <i class="fa-solid fa-check"></i> Bidet 
                                           &nbsp; <i class="fa-solid fa-check"></i> Toilet 
                                           &nbsp; <i class="fa-solid fa-check"></i> Towels 
                                           <i class="fa-solid fa-check"></i> Linen 
                                           &nbsp; <i class="fa-solid fa-check"></i> Desk 
                                           &nbsp; <i class="fa-solid fa-check"></i> Slippers 
                                           <i class="fa-solid fa-check"></i> Heating 
                                           &nbsp; <i class="fa-solid fa-check"></i> Hairdryer 
                                           &nbsp; <i class="fa-solid fa-check"></i> Towels/sheets (extra fee) 
                                           <i class="fa-solid fa-check"></i> Electric kettle 
                                           &nbsp; <i class="fa-solid fa-check"></i> Wake-up service 
                                           &nbsp; <i class="fa-solid fa-check"></i> Wardrobe or closet 
                                           <i class="fa-solid fa-check"></i> Clothes rack 
                                           &nbsp; <i class="fa-solid fa-check"></i> Toilet paper 
                                  </div>
                               </td>
                                <td>
                                  @for($i = 0; $i < $room->max_guest; $i++)
                                     <i class="fa-solid fa-person"></i>
                                  @endfor
                               </td>
                                <td>
                                 <div class="d-none room-id-{{$room->id}}">&nbsp;</div>
                                  <div style="color: rgb(234, 60, 60)" class="priceCurrentShow">{{number_format($room->price * 2 - ($room->price * 2 * 0.1)) . ' VND'}}</div>
                                  {{-- !-- Button trigger modal --> --}}
                                  <button type="button" class="btn btn-blue text-nowrap mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Naksu voucher
                                  </button>
                               
                               <!-- Modal -->
                               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          @if(!empty($coupons))
                                             @foreach($coupons as $coupon)
                                                @foreach($coupon as $item)
                                                <div class="mb-3 d-flex justify-between">
                                                   <div style="width: 70%">
                                                      <p>Code: <span>{{$item->code}}</span></p>
                                                      <p style="color: rgb(219, 102, 102)">{{$item->description}}</p>
                                                   </div>
                                                   <button type="button" class="btn btn-sm btn-blue mt-2 text-nowrap-to-normal" style="width: 25%">Use voucher</button>
                                                </div>
                                                @endforeach
                                             @endforeach
                                             
                                             @else 
                                             <div class="font-bold fs-3 text-center">Hãy đăng nhập để sử dụng voucher</div>
                                          @endif
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                  </div>
                               </div>
                               </td>
                               <td class="text-capitalize p-2" style="color: rgb(113, 176, 113)">
                                  <p class="mb-2" style="color: rgb(113, 176, 113)"><span style="color: green">Free cancellation</span> before 18 June 2024</p>   
                                  <p style="color: rgb(113, 176, 113)"><span style="color: green">No prepayment needed</span> – pay at the property</p>   
                                  <p style="color: gray">{{'Only ' . ($room->number_of_room - $room->number_room_booked) . ' rooms left on our site'}}</p>
                               </td>
                                <td class="text-capitalize" style="width: 10%">  
                                 <div class="d-none priceCurrentElement">{{$room->price}}</div>  
                                 <div class="d-none numberOfRoomAvailableElement">{{$room->number_of_room - $room->number_room_booked}}</div>  
                                  <select class="form-select quantityElement" aria-label="Default select example" name="quantityRoomElement" id="quantityElement-{{$room->id}}" style="width: 48%">
                                     <option selected value="0">0</option>
                                     @for($i = 1; $i <= ($room->number_of_room - $room->number_room_booked); $i++)
                                        <option value={{$i}}>{{$i}} &nbsp; &nbsp; {{'(' . number_format(($room->price * 2 * $i) - ($room->price * 2 * $i * 0.1)) . ' VND)'}} </option>
                                     @endfor
                                   </select>
                                </td>   
                              </tr>
                              @endforeach
   
                              @else
                              <div class="fs-3 text-center">{{$fullRooms}}</div>
                           @endif
                        </tbody>
                      </table>
                  </div>
                   <div class="col-md-2 p-0">
                     @if (Auth::user())
                            <div>
                              <form action="{{url('booking_view')}}">
                                 <input hidden type="text" name="room_type" id="roomType" value="{{$room->room_type}}">
                                 <input hidden type="text" name="priceCurrent" id="priceCurrent" value="{{$room->price}}">   
                                 <input hidden type="text" name="numberOfRoomAvailable" id="numberOfRoomAvailable" value={{$room->number_of_room - $room->number_room_booked}}>
                                 <input hidden type="text" name="NumberOfNights" id="NumberOfNights" value='2'>
                                 <input hidden type="text" name="taxAndCharges" id="taxAndCharges" value={{$room->price * 2 * 0.1}}>
                                 <input hidden type="text" name="totalPrice" id="totalPrice" value={{(($room->price * 2) - ($room->price * 2 * 0.1))}}>
                                 <input hidden type="text" name="quantityRoomInput" id="quantityRoomInput" value="0">   
                              <div class="w-full" style="background-color: #4C76B2; height: 40px;">&nbsp;</div>
                                 <div id="reserveWithNoRoom" style="display: block; background-color: white;" class="p-3">
                                    <button type="button" class="btn btn-primary mb-3">I'll reserve</button>
                                    <div class="mb-3">Confirmation is immediate</div>
                                    <i class="fa-solid fa-credit-card"></i> &nbsp; No credit card needed
                                 </div>
                                 <div id="reserveWithRoom" style="display: none; background-color: white;" class="p-3">
                                    <p>1 room for</p>
                                    <div class="uppercase fs-3" id="totalPriceShow">{{number_format(($room->price * 2) - ($room->price * 2 * 0.1)) . ' VND'}}</div>
                                    <div style="color: gray">Includes taxes and charges</div>
                                    <div class="mt-4">
                                       <button type="submit" class="btn btn-primary">I'll reserve</button>
                                       <div class="mt-2">You'll be taken to the next step</div>
                                       <div class="mt-2">Confirmation is immediate</div>
                                    </div>
                                    <div class="mt-4 font-bold" >
                                       <i class="fa-solid fa-credit-card"></i> &nbsp; No credit card needed
                                    </div>
                                    <div>
                                       <div class="font-bold mb-2">Your package:</div>
                                       <div>
                                          <span class="font-bold mb-2">Free cancellation</span> before 18 June 2024
                                       </div>
                                       <div>
                                          <span class="font-bold mb-2">No prepayment needed</span> – pay at the property
                                       </div>
                                       <div style="color: rgb(231, 167, 167)">{{'Only ' . ($room->number_of_room - $room->number_room_booked) . ' rooms left on our site'}}</div>
                                    </div>
                                 </div>
                            </div>
                            @else
                            <td>
                               <div class="d-flex justify-center text-nowrap mb-3">
                                  <a class="btn btn-dark" href="{{url('login')}}">{{__('home.header.login')}}</a>
                               </div>
                               <div>
                                  You must be logged in to make a reservation
                               </div>
                            </td>
                            @endif
                            </form>
                   </div>
                  </div>
             </div>
           </div>
        </div>
     </div>
      <!--  footer -->
      @include('home.footer')

      <script src="{{url('js/user/datetime.js')}}" type="text/javascript"></script>
      <script src="{{url('js/user/changeSearch.js')}}" type="text/javascript"></script>
   </body>
</html>