<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="admin">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Halaman Guru</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/main-responsive.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/theme_light.css')}}" type="text/css" id="skin_color">
        <link rel="stylesheet" href="{{asset('assets/css/angular-block-ui.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/css/print.css')}}" type="text/css" media="print"/>
        @section('css')
        @show
        <!--[if IE 7]>
        <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome-ie7.min.css')}}">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="footer-fixed">
        <!-- start: HEADER -->
        @include('guru.templates.header',['user' => Auth::User()])
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                @include('guru.templates.sidebar')
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    @yield('content')
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        @include('guru.templates.footer')
        <!-- end: FOOTER -->
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="{{asset('assets/plugins/respond.min.js')}}"></script>
        <script src="{{asset('assets/plugins/excanvas.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/jQuery-lib/1.10.2/jquery.min.js')}}"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="{{asset('assets/plugins/jQuery-lib/2.0.3/jquery.min.js')}}"></script>
        <!--<![endif]-->
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
        <script>var base_url = "{{url()}}";</script>
        <script src='{{asset('assets/js/angular.min.js')}}'></script>
        <script src='{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload-shim.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-block-ui.min.js')}}'></script>
        <script src='{{asset('assets/js/admin.js')}}'></script>
        @section('js')

        @show
    </body>
    <!-- end: BODY -->
</html>