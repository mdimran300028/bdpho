@extends('master')
@section('title') Question Paper Image Library @endsection
@section('page-title') Question Paper Image Library  @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Question Paper Image Library  @endsection

@section('content')
    @include('exam.question-images.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('exam.question-images.modals.add-form')
    @include('exam.question-images.modals.edit-form')
@endsection

@section('custom-script')
    @include('exam.question-images.includes.script')
@endsection


