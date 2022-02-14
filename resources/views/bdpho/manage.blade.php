@extends('master')
@section('title') Event @endsection
@section('page-title') National Event @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') National Event @endsection

@section('content')
    @include('bdpho.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('bdpho.modals.add-form')
    @include('bdpho.modals.edit-form')
@endsection

@section('custom-script')
    @include('bdpho.includes.script')
@endsection


