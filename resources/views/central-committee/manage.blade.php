@extends('master')
@section('title') Central Committee @endsection
@section('page-title') Central Committee @endsection
@section('breadcrumb-item') Dashboard @endsection
@section('active-breadcrumb-item') Central Committee @endsection

@section('content')
    @include('central-committee.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('central-committee.modals.add-form')
    @include('central-committee.modals.edit-form')
@endsection

@section('custom-script')
    @include('central-committee.includes.script')
@endsection


