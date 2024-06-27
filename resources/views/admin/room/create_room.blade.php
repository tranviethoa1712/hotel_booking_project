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
                    <form action="{{url('store_room')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <legend class="text-center text-white font-bold">Room Creating</legend>
                        <div class="form-group">
                            <label class="text-white">Room Title</label>
                            <input class="form-control" type="text" name="room_title" value="{{ old('room_title') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Description</label>
                            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Price</label>
                            <input class="form-control" type="text" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Max Guest</label>
                            <input class="form-control" type="text" name="max_guest" value="{{ old('max_guest') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Number of room</label>
                            <input class="form-control" type="text" name="number_of_room" value="{{ old('number_of_room') }}">
                            <input hidden class="form-control" type="text" name="number_room_booked" value="0">
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="text-white">Room Type</label>
                                <select class="form-control" name="room_type" value="{{ old('room_type') }}">
                                    <option value="regular" selected>Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="text-white">Free Wifi</label>
                                <select class="form-control" name="wifi" value="{{ old('wifi') }}">
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
                            <input type="submit" class="btn btn-outline-danger form-control" value="Add Room">
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>