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
        @include('admin.body')
        @include('admin.footer')
  </body>
</html>