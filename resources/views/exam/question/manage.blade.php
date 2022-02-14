@extends('master')
@section('title') Question Paper @endsection
@section('page-title') Question Paper @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') {{ $questionPaper->event->code }} Full Question Paper {{ $questionPaper->category->name }} @endsection

@section('content')
    @include('exam.question.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('exam.question.modals.add-form')
    @include('exam.question.modals.edit-form')
    @include('exam.options.modals.add-form')
    @include('exam.options.modals.edit-form')
@endsection

@section('custom-script')
    @include('exam.question.includes.script')
    @include('exam.options.includes.script')
@endsection


