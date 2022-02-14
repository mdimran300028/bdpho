@extends('master')
@section('title') Partner @endsection
@section('page-title') Partner @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Partner @endsection

@section('content')
    @include('partners.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('partners.modals.add-form')
    @include('partners.modals.edit-form')
@endsection

@section('custom-script')
    @include('partners.includes.script')
@endsection


