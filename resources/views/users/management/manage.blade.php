@extends('master')
@section('title') User Management @endsection
@section('page-title') User Management @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') User Management @endsection

@section('content')
    @include('users.management.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('users.management.modals.add-form')
    @include('users.management.modals.edit-form')
    @include('users.management.modals.edit-avatar')
@endsection

@section('custom-script')
    @include('users.management.includes.script')
@endsection
