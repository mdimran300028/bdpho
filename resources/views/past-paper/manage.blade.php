@extends('master')
@section('title') Past papers @endsection
@section('page-title') Past papers @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Past papers @endsection

@section('content')
    @include('past-paper.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('past-paper.modals.add-form')
    @include('past-paper.modals.edit-form')
@endsection

@section('custom-script')
    @include('past-paper.includes.script')
@endsection


