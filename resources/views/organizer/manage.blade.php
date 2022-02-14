@extends('master')
@section('title') Organizer @endsection
@section('page-title') Organizer @endsection
@section('breadcrumb-item') Dashboard @endsection
@section('active-breadcrumb-item') Organizer @endsection

@section('content')
    @include('organizer.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('organizer.modals.add-form')
    @include('organizer.modals.edit-form')
@endsection

@section('custom-script')
    @include('organizer.includes.script')
@endsection


