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
                    <h2>Room Details</h2>
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

             <div class="col-md-4">
                <form action="{{url('book_room')}}" method="post">
                    @csrf
                    @session('message')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $value }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endsession
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </ul>
                        </div>
                    @endif
                    <legend class="text-center  font-bold">Room Booking</legend>
                    <div class="form-group">
                        <label class="">Name</label>
                        <input class="form-control" type="text" name="name"
                        @if(Auth::id()) 
                        value="{{Auth::user()->name}}"
                        @endif
                        >
                        <input hidden class="form-control" type="text" name="room_id" value="{{$room->id}}">
                    </div>
                    <div class="form-group">
                        <label class="">Email</label>
                        <input class="form-control" type="text" name="email"
                        @if(Auth::id()) 
                        value="{{Auth::user()->email}}">
                        @endif
                        >
                    </div>
                    <div class="form-group">
                        <label class="">Phone</label>
                        <input class="form-control" type="text" name="phone" 
                        @if(Auth::id()) 
                        value="{{Auth::user()->phone}}">
                        @endif
                        >
                    </div>
                    <div class="form-group">
                        <label class="">Start Date</label>
                        <input class="form-control" type="date" name="start_date" id="startDate" value="{{ old('startDate') }}">
                    </div>
                    <div class="form-group">
                        <label class="">End Date</label>
                        <input class="form-control" type="date" name="end_date" id="endDate" value="{{ old('endDate') }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-danger form-control" value="Book Room">
                    </div>
                </form>
             </div>
           </div>
        </div>
     </div>
      <!--  footer -->
      @include('home.footer')

      <script src="{{url('js/user/datetime.js')}}" type="text/javascript"></script>
   </body>
</html>