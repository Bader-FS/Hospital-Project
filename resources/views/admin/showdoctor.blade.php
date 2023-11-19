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

      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
      <div class="container">
        <table class="table table-white ">
        <thead >
        <tr>
          <th scope="col">Doctor Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Speciality</th>
          <th scope="col">Room Number</th>
          <th scope="col">Image</th>
          <th scope="col">Delete</th>
          <th scope="col">Update</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $doctor)
        <tr>
          <td scope="row">{{$doctor->name}}</th>
          <td>{{$doctor->phone}}</td>
          <td>{{$doctor->speciality}}</td>
          <td>{{$doctor->room}}</td>
          <td>
            <img style="border-radius:0;width:150px;height:150px;" src="doctorimage/{{$doctor->image}}" alt="Error">
          </td>
          <td>
            <a onclick="return confirm('Are You Sure?')" href="{{url('deletedoctor',$doctor->id)}}">
            <i class="fa-solid fa-trash fa-2xl" style="color: #df0c0c;"></i>
            </a>
          </td>
          <td>
            <a href="{{url('updatedoctor',$doctor->id)}}">
            <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #eaee17;"></i>
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
