@extends('master')
@section('title') Region @endsection
@section('page-title') Region @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Region @endsection

@section('content')
    @include('region.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('region.modals.add-form')
    @include('region.modals.edit-form')
@endsection

@section('custom-script')
    @include('region.includes.script')
@endsection
