@extends('master')
@section('title') Question Paper @endsection
@section('page-title') Question Paper @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Question Paper @endsection

@section('content')
    @include('exam.question-paper.tables.list')
    <!-- end row -->


    <!-- Include All Modals -->
    @include('exam.question-paper.modals.add-form')
    @include('exam.question-paper.modals.edit-form')
@endsection

@section('custom-script')
    @include('exam.question-paper.includes.script')
@endsection


