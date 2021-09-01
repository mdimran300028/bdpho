@extends('master')
@section('title') Division @endsection
@section('page-title') Division @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division @endsection

@section('content')
    @include('division.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('division.modals.add-form')
    @include('division.modals.edit-form')
@endsection

@section('custom-script')
    @include('division.includes.script')
@endsection


