<x-app-layout>    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
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
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        <div class="container  m-5">

        @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>

      @endif
        <form method="post" action="{{url('upload_doctor')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group mb-4 w-50">
            <label class="form-label" for="name" >Doctor Name</label>
            <input required type="text" placeholder="Enter The Name" class="form-control" name="name" />
          </div>

          <div class="form-group mb-4 w-50" >
            <label class="form-label" for="number" >Phone Number</label>
            <input required type="number" placeholder="Enter The phone Number" style="color:black;" class="form-control" name="number" />
          </div>

          <div class="form-group mb-4 ">
            <label class="form-label" for="speciality">Doctor Name</label>
            <select required name="speciality" style="color:black;" class="form-select w-50" aria-label="Default select example">
                <option selected>Select The Speciality</option>
                <option value="skin">Skin</option>
                <option value="heart">Heart</option>
                <option value="eyes">Eyes</option>
                <option value="eyes">Public Health</option>
            </select>
          </div>

          <div class="form-group mb-4 w-50">
            <label class="form-label" for="room" >Room Number</label>
            <input required type="text" class="form-control" name="room" placeholder="Enter The Room Number" />
          </div>

          <div class="form-group">
            <label for="image" class="form-label">Doctor Image</label>
            <input required class="form-control" type="file" name="image" />
          </div>

          <input type="submit" class="btn btn-primary mb-4" style="width:180px;height:36px" value="New Doctor" />

  
        </form>

        </div>
      </div>
      
      @include('admin.script')
  </body>
</html>
