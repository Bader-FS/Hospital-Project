<x-app-layout>    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
      <div class="container  m-5">

      
      @if(session()->has('message'))
      <div class="alert alert-success" dir="ltr">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>

      @endif

      
        <form method="post" action="{{url('upload_latest')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group mb-4 w-50">
            <label class="form-label" for="name" >Publisher Name</label>
            <input required type="text" placeholder="Enter The Name" class="form-control" name="name" />
          </div>

          <div class="form-group mb-4 w-50" >
            <label class="form-label" for="title" >Title Of News</label>
            <input required type="text" placeholder="Enter The Title of news" style="color:black;" class="form-control" name="title" />
          </div>

          <div class="form-group mb-4 w-50">
            <label class="form-label" for="date">Date Of News</label>
            <input required type="date" class="form-control" name="date" style="color:black;"/>
          </div>

          <div class="form-group">
            <label for="image" class="form-label">News Image</label>
            <input required class="form-control" type="file" name="image" />
          </div>

          <input type="submit" class="btn btn-primary mb-4" style="width:180px;height:36px" value="Add News" />

  
        </form>

        </div>
      </div>

      

      </div>
   


    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
