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
        
        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">
                <div>
                    @session('message')
                    <div class="alert alert-success">
                        {{ $value }}
                    </div>
                    @endsession
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4 class="fs-4">Current Image</h4>
                    <div style="width: 25%">
                        <img src="{{url('storage/' . $room->image)}}" alt="..." class="img-fluid img-thumbnail">
                    </div>
                    <form action="{{url('update_room', $room->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <legend class="text-center text-white font-bold">Room Editing</legend>
                        <div class="form-group">
                            <label class="text-white">Room Title</label>
                            <input class="form-control" type="text" name="room_title"  value="{{ $room->room_title}}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Description</label>
                            <textarea class="form-control" name="description">{{ $room->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Price</label>
                            <input class="form-control" type="text" name="price" value="{{ $room->price }}">
                        </div>
                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <label class="text-white">Room Type</label>
                                <select class="form-control" name="room_type">
                                    <option value="{{$room->room_type}}" selected>{{$room->room_type}}</option>
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-white">Free Wifi</label>
                                <select class="form-control" name="wifi">
                                    <option value="{{$room->wifi}}" selected>{{$room->wifi}}</option>
                                    <option selected value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-white">Image</label>
                                <input class="form-control" type="file" name="image" value="{{ old('image') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-danger form-control" value="Update Room">
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>