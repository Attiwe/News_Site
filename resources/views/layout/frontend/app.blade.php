<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> {{config('app.name' )}} @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Bootstrap News Template - Free HTML Templates" name="keywords" />
    <meta content="Bootstrap News Template - Free HTML Templates" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href=" {{asset('assets/frontend/img/favicon.ico')}}" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href=" {{asset('assets/frontend/lib/slick/slick.css')}}" rel="stylesheet" />
    <link href=" {{asset('assets/frontend/lib/slick/slick-theme.css')}}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href=" {{asset('assets/frontend/css/style.css')}}" rel="stylesheet" />

    <!-- File Input -->
    <link href=" {{asset('assets/vendor/file_input/css/fileinput.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
 
    <!-- Summernote -->
    <link href=" {{asset('assets/vendor/summernotes/summernote-bs4.css')}}" rel="stylesheet" />
     
  </head>

<body>

    @include('layout.frontend.header')
    
    <!--start breadcrumb -->
     <div class="breadcrumb-wrap">
      <div class="container">
        <ul class="breadcrumb">
            @section('breadcrumb')
           <li class="breadcrumb-item"><a href="{{route('frontend.post')}}">Home</a></li>
           @show
          </ul>
      </div>
    </div>
    <!--end breadcrumb -->
    @yield('body')
    @include('layout.frontend.footer')

    <!-- Back to Top -->
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src=" {{asset('assets/frontend/lib/easing/easing.min.js')}}"></script>
    <script src=" {{asset('assets/frontend/lib/slick/slick.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src=" {{asset('assets/frontend/js/main.js')}} "></script>

    <!-- File Input -->
    <script src=" {{asset('assets/vendor/file_input/js/fileinput.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Summernote -->
    <script src=" {{asset('assets/vendor/summernotes/summernote-bs4.js')}}"></script>

    <!--  for custom js used jquery and ajax -->
     @stack('js') 

</body>

</html>