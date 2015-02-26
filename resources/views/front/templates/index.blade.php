<!DOCTYPE html>
<!-- Template Name: Clip-One - Frontend | Build with Twitter Bootstrap 3 | Version: 1.0 | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>SMA Negeri 1</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="{{asset('front/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/fonts/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/plugins/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/theme_blue.css')}}" type="text/css" id="skin_color">
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="{{asset('front/plugins/flex-slider/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/colorbox/example2/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/angular-block-ui.min.css')}}" type="text/css">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: HTML5SHIV FOR IE8 -->
        <!--[if lt IE 9]>
        <script src="front/plugins/html5shiv.js"></script>
        <![endif]-->
        <!-- end: HTML5SHIV FOR IE8 -->
    </head>
    <!-- end: HEAD -->
    <body>
        <!-- start: HEADER -->
        @include('front.templates.header',['menu' => isset($menu) ? $menu : ''])
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            @section('bread')
            @show
            <section class="wrapper">
                <div class="container">
                    <div class='row'>
                        @yield('content')
                        @include('front.templates.sidebar',['pengumuman'=>isset($pengumuman) ? $pengumuman : '','agenda'=>isset($agenda) ? $agenda : ''])
                    </div>
                </div>
            </section>
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        @include('front.templates.footer')
        <a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
        <!-- end: FOOTER -->
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="{{asset('front/plugins/respond.min.js')}}"></script>
        <script src="{{asset('front/plugins/excanvas.min.js')}}"></script>
        <script src="{{asset('front/plugins/html5shiv.js')}}"></script>
        <script type="text/javascript" src="{{asset('front/plugins/jQuery-lib/1.10.2/jquery.min.js')}}"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="{{asset('front/plugins/jQuery-lib/2.0.3/jquery.min.js')}}"></script>
        <!--<![endif]-->
        <script src="{{asset('front/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/plugins/jquery.transit/jquery.transit.js')}}"></script>
        <script src="{{asset('front/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js')}}"></script>
        <script src="{{asset('front/plugins/jquery.appear/jquery.appear.js')}}"></script>
        <script src="{{asset('front/plugins/blockUI/jquery.blockUI.js')}}"></script>
        <script src="{{asset('front/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
        <script src="{{asset('assets/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
        <script src="{{asset('front/js/main.js')}}"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="{{asset('front/plugins/flex-slider/jquery.flexslider.js')}}"></script>
        <script src="{{asset('front/plugins/mixitup/src/jquery.mixitup.js')}}"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
var base_url = "{{url()}}";
jQuery(document).ready(function() {
    Main.init();
    $('#Grid').mixitup();
    $(".group1").colorbox({
        rel: 'group1',
        transition: "none",
        width: "100%",
        height: "100%",
        retinaImage: true
    });
});
        </script>
        @section('js')

        @show
    </body>
</html>