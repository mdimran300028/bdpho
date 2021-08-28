<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>WAA-Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Muhammad Imran" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet"/>
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" id="app-style" rel="stylesheet"/>
</head>

<body>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
{{--                    <div class="bg-soft-primary">--}}
                    <div class="bg-soft-success">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-success p-4">
                                    <h5 class="text-success">Welcome Back to {{ config('app.name') }}</h5>
                                    <p>Sign in to continue to BDPhO.</p>
                                </div>
                            </div>
                            <div class="col-4 align-self-end">
                                <img src="{{ asset('assets') }}/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{ route('/') }}">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
{{--                                        <img src="{{ asset('assets') }}/images/logo.svg" alt="" class="rounded-circle" height="34">--}}
                                        <img src="{{ asset('assets/images/bdpho/general/bdphologo_small.png')}}" alt="" class="rounded-circle" height="62">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" name="email" id="username" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{ asset('assets') }}/js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Sep 2020 15:08:04 GMT -->
</html>
