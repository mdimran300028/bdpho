@extends('master')
@section('title') Class @endsection
@section('page-title') Class @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Class @endsection

@section('content')
    @include('class.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('class.modals.add-form')
    @include('class.modals.edit-form')
@endsection

@section('custom-script')
    @include('class.includes.script')
@endsection


