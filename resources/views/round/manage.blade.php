@extends('master')
@section('title') Event Round @endsection
@section('page-title') Event Round @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Event Round @endsection

@section('content')
    @include('round.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('round.modals.add-form')
    @include('round.modals.edit-form')
@endsection

@section('custom-script')
    @include('round.includes.script')
@endsection


