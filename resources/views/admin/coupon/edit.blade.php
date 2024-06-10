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
                    <form action="{{route('coupons.update', $coupon->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <legend class="text-center text-white font-bold">Coupon Editing</legend>
                        <div class="form-group">
                            <label class="text-white">Description</label>
                            <textarea class="form-control" name="description">{{ $coupon->description }}</textarea>
                          </div>
                          <div>Value type of discount amount: </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="value" value="percentage" id="flexRadioDefault1" {{ $coupon->value == 'percentage' ? 'checked' : '' }}>
                              <label class="form-check-label" for="flexRadioDefault1">
                                  Percentage
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="value" value="numeric" id="flexRadioDefault2" {{ $coupon->value == 'numeric' ? 'checked' : '' }}>
                              <label class="form-check-label" for="flexRadioDefault2">
                                Numeric
                              </label>
                            </div>
                          <div class="form-group">
                              <label class="text-white">Discount Amount</label>
                              <input class="form-control" type="text" name="amount" value="{{ $coupon->amount }}">
                          </div>
                          <div>Type of coupon: </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="type" value="voucher" id="flexRadioDefault3" {{ $coupon->type == 'voucher' ? 'checked' : '' }}>
                              <label class="form-check-label" for="flexRadioDefault3">
                                  Voucher
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="type" value="discount" id="flexRadioDefault4" {{ $coupon->type == 'discount' ? 'checked' : '' }}>
                              <label class="form-check-label" for="flexRadioDefault4">
                                Discount
                              </label>
                            </div>
                          <div class="form-group">
                              <label class="text-white">Max uses</label>
                              <input class="form-control" type="text" name="max_uses" value="{{$coupon->max_uses}}" required>
                              <input hidden class="form-control" type="text" name="uses" value={{$coupon->uses}}>
                          </div>
                          <div class="form-group">
                              <label class="text-white">Max uses user</label>
                              <input class="form-control" type="text" name="max_uses_user" value="{{$coupon->max_uses_user}}" required>
                          </div>
                          <div class="row">
                            <div class="col-sm-4">
                                <label class="text-white">Start at</label>
                                <input class="form-control" type="date" id="start_at" name="start_at" value="{{$coupon->start_at}}">
                            </div>
                            <div class="col-sm-4">
                                <label class="text-white">Expired at</label>
                                <input class="form-control" type="date" id="expired_at" name="expired_at" value="{{ $coupon->expired_at}}">
                            </div>
                          </div>
                          <div class="form-group mt-4">
                              <input type="submit" class="btn btn-outline-danger form-control" value="Add Coupon">
                          </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        @include('admin.footer')
  </body>
</html>