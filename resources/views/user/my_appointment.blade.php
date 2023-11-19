<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +212 501901136</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> BadrHospital@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a href="{{url('/')}}"><img class="w-50" src="../assets/img/logo.png" alt="Error" ></a>

        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/doctor')}}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/news')}}">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/contact')}}">Contact</a>
            </li>

            @if(Route::has('login'))

            @auth

            <li class="nav-item">
              <a class="nav-link" href="{{url('myappointment')}}">
              <i class="fa-solid fa-calendar-check fa-shake fa-xl" style="color: #28e291;"></i>
              </a>
            </li>

            <x-app-layout>
    
            </x-app-layout>


            @else 


            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
            </li>
            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{session()->get('message')}}
      </div>

  @endif

  <div class="container py-3">
    <table class="table">
      <thead class="table-dark">
      <tr>
        <th scope="col">Doctor Name</th>
        <th scope="col">Date</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        <th scope="col">Cancel Appointment</th>
      </tr>
      </thead>
      <tbody class="table-success">
      @foreach($appoint as $appoints)
      <tr>
        <td scope="row">{{$appoints->doctor}}</th>
        <td>{{$appoints->date}}</td>
        <td>{{$appoints->message}}</td>
        <td>{{$appoints->status}}</td>
        <td>
            <a href="{{url('cancel_appoint',$appoints->id)}}" onclick="return confirm('Are You Sure !')" class="btn btn-danger">Cancel</a>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>


  


  

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>