@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant List @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') District Wise Participants  @endsection

@section('content')
    @include('exam.attend.forms.select-category')

    <div id="ajaxResult"></div>
@endsection

@section('custom-script')
    @include('exam.attend.includes.script')
@endsection


