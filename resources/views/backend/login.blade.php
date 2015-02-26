<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js" ng-app="admin">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Login</title>
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
        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login example2" ng-controller="login">
        <div class="main-login col-sm-4 col-sm-offset-4">
            <div class="logo">SMA Negeri 1
            </div>
            <!-- start: LOGIN BOX -->
            <div>
                <h3>Login Ke Halaman Admin/Karyawan</h3>
                <p>
                    Masukan username dan password anda
                </p>
                <form class="form-login" ng-submit='submit()' novalidate>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <alert ng-repeat="alert in alerts" type="<%alert.type%>" close="closeAlert($index)"><% alert.msg %></alert>
                    <fieldset>
                        <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="username" placeholder="Username" ng-model='data.username'>
                                <i class="fa fa-user"></i> </span>
                        </div>
                        <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password" placeholder="Password" ng-model="data.password">
                                <i class="fa fa-lock"></i> </span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-bricky pull-right">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end: REGISTER BOX -->
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2014 &copy; SMA 1 N by Wasi Arnosa.
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="{{asset('assets/plugins/jQuery-lib/2.0.3/jquery.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('assets/plugins/ckeditor/adapters/jquery.js')}}"></script>
        <script src="{{asset('assets/plugins/colorbox/jquery.colorbox-min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
                            var base_url = "{{url()}}";</script>
        <script src='{{asset('assets/js/angular.min.js')}}'></script>
        <script src='{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-file-upload-shim.min.js')}}'></script>
        <script src='{{asset('assets/js/angular-block-ui.min.js')}}'></script>
        <script src='{{asset('assets/js/admin.js')}}'></script>
        <script src='{{asset('assets/js/controller/login.js')}}'></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    </body>
    <!-- end: BODY -->
</html>