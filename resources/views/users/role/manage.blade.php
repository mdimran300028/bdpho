@extends('master')
@section('title') User role @endsection
@section('page-title') User role @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') User role @endsection

@section('content')
    @include('users.role.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('users.role.modals.add-form')
    @include('users.role.modals.edit-form')
@endsection

@section('custom-script')
    @include('users.role.includes.script')
@endsection
