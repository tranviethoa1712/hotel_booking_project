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
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                 </div>
              </div>
           </div>
           <div class="row">
             <div class="col-md-8">
                <div id="serv_hover " style="width: 100%; height: 100%;"  class="room">
                   <div class="room_img p-5">
                      <figure><img src="{{url('storage/' . $room->image)}}" style="width: 100%;" class="card-img-top img-fluid" alt="room"/></figure>
                   </div>
                   <div class="bed_room">
                      <h3 class="fs-3">{{$room->room_title}}</h3>
                      <p class="card-text mt-4 mb-3">{!! Str::limit($room->description, 100) !!}</p>
                      <h4>Free wifi: {{ $room->wifi }}</h4>
                      <h4>Room type: {{ $room->room_type }}</h4>
                      <p class="fs-5">Price: <span class="text-red-500">{{ number_format($room->price) . ' vnd' }}</span></p>
                   </div>
                </div>
             </div>
           </div>
        </div>
     </div>
      <!--  footer -->
      @include('home.footer')
   </body>
</html>