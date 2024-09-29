<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8" />
        <title>Lupa Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

		<!-- Bootstrap css -->
		<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="{{ asset('admin/assets/js/head.js') }}"></script>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        @include('sweetalert::alert')

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="" height="22">
                                            </span>
                                        </a>

                                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Reset password anda dengan mengetik emailmu di bawah ini dan kami akan mengirim link reset password untuk mengubah password anda.</p>
                                </div>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif

                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                                    </div>

                                    <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Reset Password </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{ route('admin.login') }}" class="text-white-50 ms-1">Kembali ke halaman login</a></p>
                            </div> <!-- end col -->
                        </div>

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by Coderthemes
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    </body>
</html>
