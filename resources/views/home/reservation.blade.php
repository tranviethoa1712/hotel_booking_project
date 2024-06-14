@if(Auth::user())
               <div class="col-md-4">
                  <form action="{{url('book_room')}}" method="post">
                     @csrf
                     @session('message')
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ $value }}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     @endsession
                     @session('messageBooked')
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
                     <legend class="text-center  font-bold">{{__('home.room_details.titleBooking')}}</legend>
                     <div class="form-group">
                           <label class="">{{__('home.room_details.name_lable')}}</label>
                           <input class="form-control" type="text" name="name"
                           @if(Auth::id()) 
                           value="{{Auth::user()->name}}">
                           @else
                           >
                           @endif
                           <input hidden class="form-control" type="text" name="room_id" value="{{$room->id}}">
                     </div>
                     <div class="form-group">
                           <label class="">{{__('home.room_details.email_lable')}}</label>
                           <input class="form-control" type="text" name="email"
                           @if(Auth::id()) 
                           value="{{Auth::user()->email}}">
                           @else
                           >
                           @endif
                     </div>
                     <div class="form-group">
                           <label class="">{{__('home.room_details.phone_lable')}}</label>
                           <input class="form-control" type="text" name="phone" 
                           @if(Auth::id()) 
                           value="{{Auth::user()->phone}}">
                           @else
                           >
                           @endif
                     </div>
                     <div class="form-group">
                           <label class="">{{__('home.room_details.start_date_lable')}}</label>
                           <input class="form-control" type="date" name="start_date" id="startDate" value="{{ old('startDate') }}">
                     </div>
                     <div class="form-group">
                           <label class="">{{__('home.room_details.end_date_lable')}}</label>
                           <input class="form-control" type="date" name="end_date" id="endDate" value="{{ old('endDate') }}">
                     </div>
                     <div class="my-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           Choose your naksu voucher
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
                                 @if($coupons)
                                    @foreach($coupons as $coupon)
                                       @foreach($coupon as $item)

                                       <div class="mb-3">
                                          <p>Code: {{$item->code}}</p>
                                          <p>{{$item->description}}</p>
                                          <button type="button" class="btn btn-blue mt-2">Use voucher</button>
                                       </div>
                                       @endforeach
                                    @endforeach
                                 @endif
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group mt-3">
                           <input type="submit" name="prepayment" class="btn btn-outline-danger form-control" value="{{__('home.room_details.prepayment')}}">
                     </div>
                     <div class="form-group mt-3">
                           <input type="submit" name="deposit" class="btn btn-dark form-control" value="{{__('home.room_details.deposit')}}">
                     </div>
                     <div class="form-group mt-3">
                           <i>{{__('home.room_details.note')}}</i>
                     </div>
                  </form>
               </div>
               @else
               <div class="col-md-4 d-flex align-items-center text-nowrap text-center">
                  <h2 style="color: rgb(211, 38, 104)">Xin vui lòng đăng nhập để đặt phòng!</h2>
               </div>
             @endif