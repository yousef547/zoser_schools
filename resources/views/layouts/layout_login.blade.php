<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link href="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('assets/css/app-dark.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

</head>
<body class="auth-body-bg" cz-shortcut-listen="true">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            @yield('contect')
            <!-- end col -->

            <div class="col-lg-9 p-0 vh-100  d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center">
                    <div class="account-title text-center text-white">
                        <h4 class="mt-3 text-white">Welcome To <span class="text-warning">AMEZIA</span> </h4>
                        <h1 class="text-white">Let's Get Started</h1>
                        <p class="mt-3 font-size-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                            laoreet tellus ut tincidunt euismod.</p>
                        <div class="border w-25 mx-auto border-warning"></div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- End Log In page -->
    </div>



     <!-- JAVASCRIPT -->
     <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!--Morris Chart-->

        <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>



        <i title="Raphaël Colour Picker" style="display: none; color: transparent;"></i>

</body>
</html>