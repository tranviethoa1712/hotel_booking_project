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
       <div class="row">
         @if(Session::has('roomAvailableForTheDate'))
            @foreach (Session::get('roomAvailableForTheDate') as $room)
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
         @elseif(Session::has('allRoomAvailableForTheDate'))
            @foreach (Session::get('allRoomAvailableForTheDate') as $room)
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