<x-app-layout>    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
      <div class="container  m-5">

    
<form method="post" action="{{url('editlatest',$data->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group mb-4 w-50">
    <label class="form-label" for="name" >Publisher Name</label>
    <input required type="text" placeholder="Enter The Name" class="form-control" style="color:black;" name="name" value="{{$data->name}}" />
  </div>

  <div class="form-group mb-4 w-50" >
    <label class="form-label" for="title" >Title Of News</label>
    <input required type="text" placeholder="Enter the title of news" style="color:black;" class="form-control" name="title" value="{{$data->title}}" />
  </div>

  <div class="form-group mb-4 ">
    <label class="form-label w-50">Date</label>
    <input required type="date" class="form-control" style="color:black;" name="date" value="{{$data->date}}" />
  </div>

  <div class="form-group">
    <label class="form-label">Old Image</label>
    <img height="120" width="120" src="latestimage/{{$data->image}}" alt="Error">
  </div>

  <div class="form-group">
    <label for="image">Change Image</label>
    <input type="file" class="form-control" name="image">

  </div>

  <input type="submit" class="btn btn-primary mb-4 w-25" value="Update News" />


</form>

</div>
</div>
       

    @include('admin.script')
  </body>
</html>
