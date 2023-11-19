<x-app-layout>    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')

      <div class="page-body-wrapper">
        <div class="container">

        @if(session()->has('message'))
      <div class="alert alert-success" dir="ltr">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>

      @endif

      
        <table class="table table-white ">
        <thead>
        <tr>
          <th scope="col">Customer Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Date</th>
          <th scope="col">Message</th>
          <th scope="col">Status</th>
          <th scope="col">Approved</th>
          <th scope="col">Canceled</th>
          <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $appoint)
        <tr>
          <td scope="row">{{$appoint->name}}</th>
          <td>{{$appoint->phone}}</td>
          <td>{{$appoint->doctor}}</td>
          <td>{{$appoint->date}}</td>
          <td>{{$appoint->message}}</td>
          <td>{{$appoint->status}}</td>
          <td class="text-center">
            <a href="{{url('approved',$appoint->id)}}" >
            <i class="fa-solid fa-circle-check fa-2xl" style="color: #27aa36;"></i>
            </a>
          </td>
          <td class="text-center">
            <a href="{{url('canceled',$appoint->id)}}">
            <i class="fa-sharp fa-solid fa-circle-xmark fa-2xl" style="color: #d50b0b;"></i>
            </a>
          </td>
          <td>
            <a onclick="return confirm('Are You Sure?')" href="{{url('deleteappoint',$appoint->id)}}">
            <i class="fa-solid fa-trash fa-xl" style="color: #df0c0c;"></i>
            </a>
          </td>
        </tr>
        @endforeach
       </tbody>
    </table>

        </div>
      </div>

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
