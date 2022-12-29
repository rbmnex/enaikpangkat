<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading bordered-layout" data-layout="bordered-layout" data-textdirection="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ENaik Pangkat</title>
    <link rel="apple-touch-icon" href="{{asset('asset/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asset/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->
    @yield('CSS')
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/core/menu/menu-types/vertical-menu.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('asset/css/pages/dashboard-ecommerce.css')}}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/charts/chart-apex.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->


    @yield('customCss')
    <style>
    .flatpickr-wrapper {
        display: block !important;
    }
    </style>
    </head>
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
        @include('includes.header')
        @include('includes.menu')
        <div class="app-content content ">
            <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                    <div class="content-wrapper container-xxl p-0">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
         <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        @include('includes.footer')
        <!-- BEGIN: Vendor JS-->
    <script src="{{asset('asset/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->
    @yield('JS')
    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{asset('asset/vendors/js/charts/apexcharts.min.js')}}"></script> --}}
    <script src="{{asset('asset/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('asset/js/core/app-menu.js')}}"></script>
    <script src="{{asset('asset/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->
    <script src="{{asset('local/common/js/app.js')}}"></script>

    @yield('customJs')

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    </body>
</html>
