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
                          <th class="text-center" scope="col">Room Title</th>
                          <th class="text-center" scope="col">Image</th>
                          <th class="text-center" scope="col">Description</th>
                          <th class="text-center" scope="col">Price</th>
                          <th class="text-center" scope="col">Wifi</th>
                          <th class="text-center" scope="col">Room Type</th>
                          <th class="text-center" scope="col">Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                            <th class="text-center" scope="row">{{$room->id}}</th>
                            <td class="text-center">{{$room->room_title}}</td>
                            <td class="text-center"><img src="{{url('storage/' . $room->image)}}" class="rounded img-responsive" width="100px" height="100px" alt="room image"></td>
                            <td class="text-center">{{$room->description}}</td>
                            <td class="text-center">{{$room->price}}</td>
                            <td class="text-center">{{$room->wifi}}</td>
                            <td class="text-center">{{$room->room_type}}</td>
                            <td class="text-center">
                                <a href="{{url('edit_room', $room->id)}}" class="btn btn-success">Edit</a>
                                &nbsp;
                                <a onclick="return confirm('Are you sure to delete this room?')" href="{{url('delete_room', $room->id)}}" class="btn btn-danger">Delete</a>
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