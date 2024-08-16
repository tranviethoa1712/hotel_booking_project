<div class="d-flex align-items-stretch">
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class={{Route::is('home') ? "active" : ""}}><a href="{{url('home')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li class={{Route::is('admin.create_room') ? "active" : ""}}><a href="{{url('create_room')}}">Add Room</a></li>
                    <li class={{Route::is('admin.view_room') ? "active" : ""}}><a href="{{url('view_room')}}">View Rooms</a></li>
                  </ul>
                </li>
                <li class={{Route::is('admin.bookings') ? "active" : ""}}><a href="{{url('bookings')}}"> <i class="icon-home"></i>Bookings </a></li>
                <li class={{Route::is('admin.gallery') ? "active" : ""}}><a href="{{url('galleries')}}"> <i class="icon-home"></i>Galleries </a></li>
                <li class={{Route::is('admin.contacts') ? "active" : ""}}><a href="{{url('contacts')}}"> <i class="icon-home"></i>Contacts </a></li>
                <li><a href="#couponDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Coupons </a>
                  <ul id="couponDropdown" class="collapse list-unstyled ">
                    <li class={{Route::is('coupons.create') ? "active" : ""}}><a href="{{url('coupons/create')}}">Create Coupon</a></li>
                    <li class={{Route::is('coupons.index') ? "active" : ""}}><a href="{{route('coupons.index')}}">View Coupons</a></li>
                  </ul>
                </li>
                <li class={{Route::is('create_room') ? "active" : ""}}><a href="{{url('transactions')}}"> <i class="icon-home"></i>Transactions </a></li>
        </ul><span class="heading">Extras</span>
      </nav>