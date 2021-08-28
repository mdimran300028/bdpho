<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Muhammad Imran" name="author" />
    <!-- App favicon -->
{{--    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">--}}
    <link rel="shortcut icon" href="{{ asset('assets/images/bdpho/general/bdphologo_small.png')}}">

   @include('includes.head-stylesheet-links')
   @include('includes.head-script-links')
    @yield('missing-stylesheets')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">
    @include('includes.header')
    @include('includes.vertical-menu')
    <!-- ============================================================== -->
    <!-- Start main Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @include('includes.page-content')
        @include('includes.footer')
        @include('includes.modals')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

@include('includes.right-sidebar')

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@include('includes.footer-script-links')

</body>

</html>
