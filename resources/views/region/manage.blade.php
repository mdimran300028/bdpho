@extends('master')
@section('title') Region @endsection
@section('page-title') Region @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Region @endsection

@section('content')
    @include('region.tables.region-list')
    <!-- end row -->
@endsection
