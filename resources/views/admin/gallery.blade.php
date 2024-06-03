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
                @session('error')
                    <div class="alert alert-danger">
                        {{ $value }}
                    </div>
                @endsession
                <form action="{{url('store_gallery')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <legend class="text-center text-white font-bold">Gallery Create</legend>
                    <div class="form-group">
                        <label class="text-white">Image</label>
                        <input class="form-control" type="file" name="image" value="{{ old('image') }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-danger form-control" value="Add gellery">
                    </div>
                </form>
                <div class="row">
                    @if(!empty($galleries))
                        @foreach($galleries as $gallery)
                        <div class="col-md-4 mb-5">
                            <img style="width: 100%; height: 100%;" src="{{url('storage/' . $gallery->image)}}" alt="">
                            <div><a class="btn btn-danger" href="{{url('delete_gallery', $gallery->id)}}">Delete</a></div>
                        </div>
                        @endforeach
                    @endif
                </div>
              </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>