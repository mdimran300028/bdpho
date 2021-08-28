@extends('master')
@section('title') Product @endsection
@section('page-title') Add Product @endsection
@section('breadcrumb-item') Setting Module @endsection
@section('active-breadcrumb-item') Add Product @endsection

@section('content')
        @include('product.includes.form')
@endsection

@section('custom-script')
    <script>

    </script>
@endsection
