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
                <table class="table table-dark table-striped" style="width: 100%">
                    <thead>
                        <tr>
                          <th class="text-center" scope="col">ID</th>
                          <th class="text-center" scope="col">transaction Code</th>
                          <th class="text-center" scope="col">Bank Code</th>
                          <th class="text-center" scope="col">Bank Tran.No</th>
                          <th class="text-center" scope="col">Transaction No</th>
                          <th class="text-center" scope="col">Content</th>
                          <th class="text-center" scope="col">Amount</th>
                          <th class="text-center" scope="col">Pay Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                            <th class="text-center" scope="row">{{$transaction->id}}</th>
                            <td class="text-center">{{$transaction->booking_code}}</td>
                            <td class="text-center">{{$transaction->bank_code}}</td>
                            <td class="text-center">{{$transaction->bank_tran_no}}</td>
                            <td class="text-center">{{$transaction->transaction_no}}</td>
                            <td class="text-center">{{$transaction->content}}</td>
                            <td class="text-center">{{$transaction->amount}}</td>
                            <td class="text-center">{{$transaction->pay_date}}</td>
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