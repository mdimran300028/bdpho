@extends('master')
@section('title') Notice @endsection
@section('page-title') Notice @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Notice @endsection

@section('content')
    @include('notice.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('notice.modals.add-form')
    @include('notice.modals.edit-form')
@endsection

@section('custom-script')
    @include('notice.includes.script')
@endsection


