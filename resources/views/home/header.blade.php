<div class="header">
    <div class="container">
       <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
             <div class="full">
                <div class="center-desk">
                   <div class="logo">
                      <a href="{{url('/')}}"><img class="img-responsive" src="{{url('images/naksu_hotel_logo.png')}}" style="max-height: 90px;" alt="#" /></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
             <nav class="navigation navbar navbar-expand-md navbar-dark ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                   <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                         <a class="nav-link {{ Request::is('/') ? ' active' : '' }}" href="{{url('/')}}">Home</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('about') ? ' active' : '' }}" href="{{url('about')}}">About</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('our_rooms') ? ' active' : '' }}" href="{{url('our_rooms')}}">Our room</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link {{ Request::is('our_galleries') ? ' active' : '' }}" href="{{url('our_galleries')}}">Gallery</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link text-nowrap {{ Request::is('contact_view') ? ' active' : '' }}" href="{{url('contact_view')}}">Contact Us</a>
                      </li>

                     @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                           <x-app-layout>
   
                           </x-app-layout>
                        </li>
                     @else
                        <li class="nav-item pr-2">
                           <a class="btn btn-outline-dark" href="{{url('login')}}">Login</a>
                        </li>

                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="btn btn-register" href="{{url('register')}}">Register</a>
                     </li>
                     @endif
                     @endauth
                     @endif
                   </ul>
                </div>
             </nav>
          </div>
       </div>
    </div>
 </div>