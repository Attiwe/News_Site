<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ config('app.name') }} @yield('title') </title>

    @livewireStyles

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" {{asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
<!-- Summernote -->
<link href=" {{asset('assets/vendor/summernotes/summernote-bs4.css')}}" rel="stylesheet" />
 <!-- File Input -->
 <link href=" {{asset('assets/vendor/file_input/css/fileinput.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
@stack('css')
</head>

<body id="page-top">
 
    <div id="wrapper">

       @include('layout.dashboard.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               @include('layout.dashboard.topbor')

               @yield('body')
            </div>
            <!-- End of Main Content -->

           @include('layout.dashboard.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin._logoutModal')
 

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src=" {{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src=" {{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src=" {{asset('assets/admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts
    <script src=" {{asset('assets/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src=" {{asset('assets/admin/js/demo/chart-pie-demo.js')}}"></script> -->

    <!-- File Input -->
    <script src=" {{asset('assets/vendor/file_input/js/fileinput.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Summernote -->
    <script src=" {{asset('assets/vendor/summernotes/summernote-bs4.js')}}"></script>
 
    <!--  for custom js used jquery and ajax -->
    @stack('js') 
    @livewireScripts


</body>

</html>