@extends('master')
@section('title') Pages @endsection
@section('page-title') Pages @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Pages @endsection

@section('content')
    @include('pages.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('pages.modals.add-form')
@endsection

@section('custom-script')
    @include('pages.includes.script')
@endsection


