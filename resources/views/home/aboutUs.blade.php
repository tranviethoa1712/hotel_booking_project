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
         <!-- end header inner -->
      </header>
      <!-- end header -->
     <div class="back_re mt-3">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="title">
                <h2>About Us</h2>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- about -->
 <div class="about">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-5">
             <div class="titlepage">
                <p class="margin_0">
                  Hotel descriptions are becoming a more prominent part of search engine marketing technology, however, they are more difficult to write than they might sound. To make a description of hotels writing bulletproof, unskippable, and exciting is by having a blog feature. Because hotels are not just places to stay they are also a place where people go for a vacation. This means that when describing a hotel the information should include details about what activities you can do in them and not just about the room.
                </p>
             </div>
          </div>
          <div class="col-md-7">
             <div class="about_img">
                <figure><img src="images/about.png" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end about -->
      <!--  footer -->
      @include('home.footer')
   </body>
</html>