<!DOCTYPE html>
<html lang="id">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title') | Food Park</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

        <!-- Plugins css -->
        <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap css -->
        <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- Toastr css -->
        <link href="{{ asset('admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- fontawesome 5.11.2 -->
        <link href="{{ asset('admin/assets/libs/font-awesome-5.11.2/all.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons css -->
        <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Dropify css -->
        <link href="{{ asset('admin/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet">
        <!-- Datatables css -->
        <link href="{{ asset('admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
        <!-- Select2 css -->
        <link href="{{ asset('admin/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/libs/select2/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />
        <!-- Summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <!-- Head js -->
        <script src="{{ asset('admin/assets/js/head.js') }}"></script>

        @stack('styles')

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
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    @include('admin.layouts.sidebar')
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
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
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                @include('admin.layouts.option-sidebar')

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

        <!-- jQuery js -->
        <script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{ asset('admin/assets/js/pages/dashboard-1.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

        <!-- Toastr js -->
        <script src="{{ asset('admin/assets/libs/toastr/build/toastr.min.js') }}"></script>

        <!-- Select2 js -->
        <script src="{{ asset('admin/assets/libs/select2/js/select2.min.js') }}"></script>

        <!-- Summernote js -->
        <script src="{{ asset('admin/assets/libs/summernote/summernote-lite.min.js') }}"></script>

        <!-- Datatables js -->
        <script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

        <!-- Init form advanced js-->
        <script src="{{ asset('admin/assets/js/pages/form-advanced.init.js') }}"></script>

        <script>
            // Terapkan pengaturan tema yang disimpan sebelum halaman selesai dimuat
            document.addEventListener('DOMContentLoaded', function() {
                const savedLayoutColor = localStorage.getItem('layoutColor');
                const savedLeftbarColor = localStorage.getItem('leftbarColor');
                const savedTopbarColor = localStorage.getItem('topbarColor');

                if (savedLayoutColor) {
                    document.body.setAttribute('data-theme', savedLayoutColor);
                }
                if (savedLeftbarColor) {
                    document.body.setAttribute('data-leftbar-color', savedLeftbarColor);
                }
                if (savedTopbarColor) {
                    document.body.setAttribute('data-topbar-color', savedTopbarColor);
                }
            });

            // toastr
            toastr.options.progressBar = true;
            toastr.options.closeButton = true;

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}")
                @endforeach
            @endif
        </script>

        @stack('scripts')

    </body>
</html>
