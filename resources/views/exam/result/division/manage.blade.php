@extends('master')
@section('title') Division Wise Result @endsection
@section('page-title') Division Wise Result @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division Wise Result  @endsection

@section('content')
    @include('exam.result.division.forms.select-category')

    <div id="ajaxResult"></div>
@endsection

@section('custom-script')
    @include('exam.result.division.includes.script')
@endsection


