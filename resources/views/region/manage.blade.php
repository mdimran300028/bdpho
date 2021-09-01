@extends('master')
@section('title') Region @endsection
@section('page-title') Region @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Region @endsection

@section('content')
    @include('region.tables.list')
    <!-- end row -->
@endsection

@section('modal-content')
    @include('region.modals.add-form')
@endsection



@section('custom-script')
    @include('region.includes.script')
@endsection
