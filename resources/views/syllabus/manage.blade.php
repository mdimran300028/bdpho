@extends('master')
@section('title') Syllabus @endsection
@section('page-title') Syllabus @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Syllabus @endsection

@section('content')
    @include('syllabus.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('syllabus.modals.add-form')
    @include('syllabus.modals.edit-form')
@endsection

@section('custom-script')
    @include('syllabus.includes.script')
@endsection


