@extends('master')
@section('title') Product @endsection
@section('page-title') Manage Product @endsection
@section('breadcrumb-item') Setting Module @endsection
@section('active-breadcrumb-item') Manage Product @endsection

@section('content')
    @include('product.includes.edit-form')
@endsection

@section('custom-script')
    <script>
        $('#datatable').DataTable();
    </script>
@endsection
