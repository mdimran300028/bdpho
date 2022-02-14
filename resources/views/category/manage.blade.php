@extends('master')
@section('title') Category @endsection
@section('page-title') Category @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Category @endsection

@section('content')
    @include('category.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('category.modals.add-form')
    @include('category.modals.edit-form')
@endsection

@section('custom-script')
    @include('category.includes.script')
@endsection


