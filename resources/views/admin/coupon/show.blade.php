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
                @session('failed')
                    <div class="alert alert-success">
                        {{ $value }}
                    </div>
                @endsession
                @session('error')
                    <div class="alert alert-danger">
                        {{ $value }}
                    </div>
                @endsession
                <table class="table table-dark table-striped" style="width: 100%">
                    <thead>
                        <tr>
                          <th class="text-center text-nowrap" scope="col">ID</th>
                          <th class="text-center text-nowrap" scope="col">Description</th>
                          <th class="text-center text-nowrap" scope="col">Code</th>
                          <th class="text-center text-nowrap" scope="col">Type</th>
                          <th class="text-center text-nowrap" scope="col">Value type of amount</th>
                          <th class="text-center text-nowrap" scope="col">Amount</th>
                          <th class="text-center text-nowrap" scope="col">Uses</th>
                          <th class="text-center text-nowrap" scope="col">Max Uses</th>
                          <th class="text-center text-nowrap" scope="col">Max Uses User</th>
                          <th class="text-center text-nowrap" scope="col">Start at</th>
                          <th class="text-center text-nowrap" scope="col">Expired at</th>
                          <th class="text-center text-nowrap" scope="col">Updated at</th>
                          <th class="text-center text-nowrap" scope="col">Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                            <th class="text-center" scope="row">{{$coupon->id}}</th>
                            <td class="text-center">{{$coupon->description}}</td>
                            <td class="text-center text-nowrap">{{$coupon->code}}</td>
                            <td class="text-center">{{$coupon->type}}</td>
                            <td class="text-center">{{$coupon->value}}</td>
                            <td class="text-center">{{$coupon->amount}}</td>
                            <td class="text-center">{{$coupon->uses}}</td>
                            <td class="text-center">{{$coupon->max_uses}}</td>
                            <td class="text-center">{{$coupon->max_uses_user}}</td>
                            <td class="text-center">{{$coupon->start_at}}</td>
                            <td class="text-center">{{$coupon->expired_at}}</td>
                            <td class="text-center">{{$coupon->updated_at}}</td>
                            <td class="text-center text-nowrap">
                                <a class="btn btn-success" href="{{route('coupons.edit', $coupon->id)}}">Edit</a>
                                &nbsp;
                                <a onclick="return confirm('Are you sure to delete this coupon?')" href="{{route('coupons.delete', $coupon->id)}}" class="btn btn-danger">Delete</a>
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