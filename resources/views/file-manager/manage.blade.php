@extends('master')
@section('title') File Manager @endsection
@section('page-title') File Manager @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') File Manager @endsection

@section('content')
    @include('file-manager.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('file-manager.modals.add-form')
    @include('file-manager.modals.edit-form')
@endsection

@section('custom-script')
    @include('file-manager.includes.script')
@endsection


