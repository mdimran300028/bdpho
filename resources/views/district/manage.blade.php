@extends('master')
@section('title') District @endsection
@section('page-title') District @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') District @endsection

@section('content')
    @include('district.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('district.modals.add-form')
    @include('district.modals.edit-form')
@endsection

@section('custom-script')
    @include('district.includes.script')
@endsection


