<section class="banner_main">
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
       <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
          <div class="carousel-item active">
             <img class="first-slide" src="images/banner1.jpg" alt="First slide">
             <div class="container">
             </div>
          </div>
          <div class="carousel-item">
             <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
             <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
          </div>
       </div>
       <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
       </a>
    </div>
    <div class="booking_ocline">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <div class="book_room">
                   <h1>Book a Room Online</h1>
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
                         <div class="col-md-12">
                           <label for="startDate">Arrival</label>
                           <input id="startDate" name="startDate" class="form-control rounded" type="date" required/>
                         </div>
                         <div class="col-md-12">
                           <label for="endDate">Leaving</label>
                           <input id="endDate" name="endDate" class="form-control rounded" type="date" required/>
                         </div>
                         <div class="col-md-12">
                            <button type="submit" class="book_btn">Book Now</button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>