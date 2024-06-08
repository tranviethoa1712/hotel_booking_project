<div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>{{__('home.contact.title')}}</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <form id="request" class="main_form" method="post" action="{{url('contact')}}">
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
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="{{__('home.contact.placeholder.name')}}" type="text" name="name"> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="{{__('home.contact.placeholder.email')}}" type="text" name="email"> 
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="{{__('home.contact.placeholder.phone_number')}}" type="text" name="phone">                          
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="{{__('home.contact.placeholder.message')}}" type="type" name="message">{{__('home.contact.placeholder.message')}}</textarea>
                   </div>
                   <div class="col-md-12">
                      <button type="submit" class="send_btn">{{__('home.contact.submit')}}</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">    
             <div class="map_main">
               <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Ha+Noi" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
               </div>
             </div>
          </div>
       </div>
    </div>
 </div>