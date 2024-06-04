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
                    <form action="{{url('mail', $data->id)}}" method="post">
                        @csrf
                        <legend class="text-center text-white font-bold">Mail send to {{$data->email}}</legend>
                        <div class="form-group">
                            <label class="text-white">Greeting</label>
                            <input class="form-control" type="text" name="greeting" value="{{ old('greeting') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Mail Body</label>
                            <textarea class="form-control" name="body" value="{{ old('description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-white">Action Text</label>
                            <input class="form-control" type="text" name="action_text" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Action URL</label>
                            <input class="form-control" type="text" name="action_url" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label class="text-white">End Line</label>
                            <input class="form-control" type="text" name="end_line" value="{{ old('price') }}">
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