<div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
       <div class="row">
          @if(!empty($galleries))
            @foreach($galleries as $gallery)
            <div class="col-md-3 col-sm-6">
               <div class="gallery_img">
                  <figure><img style="width: 100%; height: 200px;" src="{{url('storage/' . $gallery->image)}}" alt=""></figure>
               </div>
            </div>
            @endforeach
         @endif
       </div>
    </div>
 </div>