<div class="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <img src="{{url('images/hotel_sale_banner_luxury_room.jpg')}}" width="100%" alt="">
         </div>
         @if(Auth::user()) 
            @foreach($coupons as $coupon)
            <div class="col-md-6 d-flex mt-5 mb-5 border">
               <div style="width: 30%;" class="align-items-center p-5 border-right">
                  <div class="thumbnail mb-2">
                     <img src="images/luna_hotel.jpg" style="border-radius: 100%;" height="30%">
                  </div>
                  <div>
                     <p>Naksu Hotel Voucher</p>
                  </div>
               </div>
               <div style="width: 70%;" class="p-5 d-flex flex-column">
                  <div class="fs-4">{{$coupon->description}}</div>
                  <button type="button" class="btn btn-lg btn-blue mt-auto coupon-toggle" data-id={{$coupon->id}}    
                     @if(empty($couponIdArray))
                     >Lưu voucher
                     @else
                        @foreach($couponIdArray as $couponUserId)
                           @if($coupon->id == $couponUserId)
                              disabled>{{'Đã Lưu (Save)'}} 
                              @break(1)
                           @endif
                        @endforeach
                     @endif

                  </button>
               </div>
            </div>
            @endforeach
            @else 
            <div class="col-md-12 d-flex align-items-center text-nowrap justify-content-center mt-4">
               <div>
                  <h2 style="color: rgb(211, 38, 104)">Xin vui lòng đăng nhập để được nhận voucher!</h2>
                  <div class="nav-item pr-2 text-nowrap d-flex justify-content-center">
                     <a class="btn btn-dark" href="{{url('login')}}">{{__('home.header.login')}}</a>
                  </div>
               </div>
            </div>
         @endif
         </div>
      </div>
   </div>