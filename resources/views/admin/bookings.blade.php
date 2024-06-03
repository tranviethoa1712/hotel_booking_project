<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
     {{-- Header --}}
    @include('admin.header')
    {{-- end Header --}}
    <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">
                @session('message')
                    <div class="alert alert-success">
                        {{ $value }}
                    </div>
                @endsession
                <table class="table table-dark table-striped" style="width: 100%">
                    <thead>
                        <tr>
                          <th class="text-center" scope="col">ID</th>
                          <th class="text-center" scope="col">Customer Name</th>
                          <th class="text-center" scope="col">Email</th>
                          <th class="text-center" scope="col">Phone</th>
                          <th class="text-center" scope="col">Arrival Date</th>
                          <th class="text-center" scope="col">Leaving Date</th>
                          <th class="text-center" scope="col">Room Title</th>
                          <th class="text-center" scope="col">Room Price</th>
                          <th class="text-center" scope="col">Room image</th>
                          <th class="text-center" scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                            <th class="text-center" scope="row">{{$booking->id}}</th>
                            <td class="text-center">{{$booking->name}}</td>
                            <td class="text-center">{{$booking->email}}</td>
                            <td class="text-center">{{$booking->phone}}</td>
                            <td class="text-center">{{$booking->start_date}}</td>
                            <td class="text-center">{{$booking->end_date}}</td>
                            <td class="text-center">{{$booking->room->room_title}}</td>
                            <td class="text-center">{{$booking->room->price}}</td>
                            <td class="text-center"><img style="width: 200px" src={{url('storage/' . $booking->room->image)}} alt="room image"></td>
                            <td class="text-center">
                                <a onclick="return confirm('Are you sure to delete this booking?')" href="{{url('delete_booking', $booking->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>