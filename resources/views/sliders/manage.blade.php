@extends('master')
@section('title') Slider @endsection
@section('page-title') Slider @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Slider @endsection

@section('content')
    @include('sliders.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('sliders.modals.add-form')
    @include('sliders.modals.edit-form')
@endsection

@section('custom-script')
    @include('sliders.includes.script')
@endsection


