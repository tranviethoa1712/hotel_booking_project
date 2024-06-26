<div class="header">
    <div class="container">
       <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
             <div class="full">
                <div class="center-desk">
                   <div class="logo">
                      <a href="{{url('/')}}"><img class="img-responsive" src="{{url('images/naksu_hotel_logo.png')}}" style="max-height: 90px;" alt="#" /></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
             <nav class="navigation navbar navbar-expand-md navbar-dark ">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="" id="navbarsExample04">
                   <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('/') ? ' active' : '' }}" href="{{url('/')}}">{{ __('home.header.home') }}</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('about') ? ' active' : '' }}" href="{{url('about')}}">{{ __('home.header.about') }}</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('our_rooms') ? ' active' : '' }}" href="{{url('our_rooms')}}">{{ __('home.header.our_room') }}</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('our_galleries') ? ' active' : '' }}" href="{{url('our_galleries')}}">{{ __('home.header.gallery') }}</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('contact_view') ? ' active' : '' }}" href="{{url('contact_view')}}">{{ __('home.header.contact') }}</a>
                      </li>
                      @if (Auth::id())
                        <li class="nav-item">
                           <a class="nav-link text-nowrap {{ Request::is('coupon_view') ? ' active' : '' }}" href="{{url('coupon_view')}}">{{ __('home.header.voucher') }}</a>
                        </li>
                      @endif

                     @if (Route::has('login'))
                        @auth
                        <li class="nav-item text-nowrap">
                           <a class="nav-link text-nowrap {{ Request::is('my_booking') ? ' active' : '' }}" href="{{url('my_booking')}}">My Booking</a>
                        </li>
                        <li class="nav-item text-nowrap">
                           <x-app-layout>
   
                           </x-app-layout>
                        </li>
                        @else
                        <li class="nav-item pr-2 text-nowrap">
                           <a class="btn btn-outline-dark" href="{{url('login')}}">{{__('home.header.login')}}</a>
                        </li>
                        
                        @if (Route::has('register'))
                        <li class="nav-item text-nowrap">
                           <a class="btn btn-register" href="{{url('register')}}">{{__('home.header.register')}}</a>
                        </li>
                        @endauth
                        @endif
                     @endif
                     <li class="nav-item ml-2 text-nowrap">
                        <div class="dropdown">
                           <a href="#" class="btn btn-danger dropdown-toggle text-decoration-none" data-toggle="dropdown">
                               {{ Config::get('languages')[App::getLocale()] }}
                           </a>
                           <ul class="dropdown-menu">
                               @foreach (Config::get('languages') as $lang => $language)
                                   @if ($lang != App::getLocale())
                                       <li>
                                           <a class="dropdown-item" href="{{ route('user.switchLang', $lang) }}">{{$language}}</a>
                                       </li>
                                   @endif
                               @endforeach
                           </ul>
                        </div>                       
                     </li>
                   </ul>
                </div>
             </nav>
          </div>
       </div>
    </div>
 </div>