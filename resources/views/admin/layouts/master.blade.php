<!DOCTYPE html>
<html lang="id">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title') | FoodPark Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Andhika Yr" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- Dropify css -->
        <link href="{{ asset('admin/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet">
        <!-- toastr css -->
        <link href="{{ asset('admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

        <!-- Bootstrap css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Head js -->
        <script src="{{ asset('admin/assets/js/head.js') }}"></script>

        <style>
            .toast-error {
                --ct-toast-background-color: #ff0000 !important;
            }
        </style>

    </head>

    <!-- body start -->
    <body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

        @include('sweetalert::alert')

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('admin.layouts.navbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    @yield('content')
                    <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('admin.layouts.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        @include('admin.layouts.option-sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{ asset('admin/assets/js/pages/dashboard-1.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

        <!-- Dropify js -->
        <script src="{{ asset('admin/assets/libs/dropify/js/dropify.min.js') }}"></script>

        <!-- toastr js -->
        <script src="{{ asset('admin/assets/libs/toastr/build/toastr.min.js') }}"></script>

        <script>
            // tampilkan error dengan toastr
            toastr.options.timeOut = 6000;
            toastr.options.extendedTimeOut = 8000;
            toastr.options.progressBar = true;
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        </script>

        @stack('scripts')

    </body>
</html>
