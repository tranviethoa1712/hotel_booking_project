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
                          <th class="text-center" scope="col">Name</th>
                          <th class="text-center" scope="col">Email</th>
                          <th class="text-center" scope="col">Phone</th>
                          <th class="text-center" scope="col">Message</th>
                          <th class="text-center" scope="col">Send Email</th>
                      </thead>
                      <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                              <th class="text-center" scope="row">{{$contact->id}}</th>
                              <td class="text-center">{{$contact->name}}</td>
                              <td class="text-center">{{$contact->email}}</td>
                              <td class="text-center">{{$contact->phone}}</td>
                              <td class="text-center">{{$contact->message}}</td>
                              <td class="text-center">
                                <a class="btn btn-success" href="{{url('send_mail', $contact->id)}}">Send mail</a>
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