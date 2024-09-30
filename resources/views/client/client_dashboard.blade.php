<!doctype html>
<html lang="en">

<head>
    {{-- {{asset('backend/')}} --}}
    <meta charset="utf-8" />
    <title>Client Dashboard | Minia - Minimal Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">

    <!-- plugin css -->
    <link href="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/preloader.min.css')}}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
    @if (Session::has('success'))
    <div class="alert alert-success">
        <li class="text">{{ Session::get('success') }}</li>

    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">
        <li class="text">{{ Session::get('error') }}</li>

    </div>
    @endif

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('client.body.header')
        @include('client.body.sidebar')




        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('client')

            @include('client.body.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    @include('client.body.rightsidebar')

    <!-- Right bar overlay-->
    <div class="rightbar-overlay">

    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/feather-icons/feather.min.js')}}"></script>
    <!-- pace js -->
    <script src="{{asset('backend/assets/libs/pace-js/pace.min.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}">
    </script>
    <script
        src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}">
    </script>
    <!-- dashboard init -->
    <script src="{{asset('backend/assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>


</body>

</html>