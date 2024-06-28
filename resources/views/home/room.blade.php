<div class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>{{__('home.room.title')}}</h2>
                <p>{{__('home.room.description')}}</p>
             </div>
          </div>
       </div>
       @if(Request::is('our_rooms'))
       <div class="my-5">
         @session('roomsBooked')
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
         <form action="{{url('roomAvailableForTheDate')}}" method="post">
            @csrf
            <div class="row">
               <div class="col-md-4 mb-3">
                  <span class="fs-4">{{__('home.slider.arrival')}}</span>
                  <input id="startDate" name="startDate" class="form-control rounded mt-3" type="date" required/>
               </div>
               <div class="col-md-4 mb-3">
                  <span class="fs-4">{{__('home.slider.departing')}}</span>
                  <input id="endDate" name="endDate" class="form-control rounded mt-3" type="date" required/>
               </div>
               <div class="col-md-4 mb-3">
                  <span class="fs-4">Room Type</span>
                  <select class="form-control rounded mt-3" name="room_type" value="{{ old('room_type') }}">
                     <option value="regular" selected>Regular</option>
                     <option value="premium">Premium</option>
                     <option value="deluxe">Deluxe</option>
                  </select>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="book_btn mt-3">{{__('home.slider.submit')}}</button>
               </div>
            </div>
         </form>
       </div>
       @endif
       <div class="row">
         @if(Session::has('roomAvailableForTheDate'))
            @foreach (Session::get('roomAvailableForTheDate') as $room)
               @if($room->number_room_booked >= $room->number_of_room) 
                  @continue
               @endif
               <div class="col-md-4 col-sm-6 mb-5">
                  <div id="serv_hover card" style="width: 100%; height: 100%;"  class="room">
                     <div class="room_img">
                        <figure><img src="{{url('storage/' . $room->image)}}" style="width: 100%;" class="card-img-top" alt="room"/></figure>
                     </div>
                     <div class="bed_room card-body d-flex flex-column">
                        <h3 class="card-title">{{$room->room_title}}</h3>
                        <p class="card-text mt-4">{!! Str::limit($room->description, 100) !!}</p>
                        <a href="{{route('user.room_details', $room->id)}}" class="btn view-room-btn mt-auto align-self-end">View room</a> 
                     </div>
                  </div>
               </div>
            @endforeach
         @else 
            @foreach ($rooms as $room)
               <div class="col-md-4 col-sm-6 mb-5">
                  <div id="serv_hover card" style="width: 100%; height: 100%;"  class="room">
                     <div class="room_img">
                        <figure><img src="{{url('storage/' . $room->image)}}" style="width: 100%;" class="card-img-top" alt="room"/></figure>
                     </div>
                     <div class="bed_room card-body">
                        <h3 class="card-title">{{$room->room_title}}</h3>
                        <p class="card-text mt-4 mb-3">{!! Str::limit($room->description, 100) !!}</p>
                        <div class="mt-auto">
                           <a href="{{route('user.room_details', $room->id)}}" class="btn view-room-btn">View room</a>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         @endif
       </div>
    </div>
 </div>