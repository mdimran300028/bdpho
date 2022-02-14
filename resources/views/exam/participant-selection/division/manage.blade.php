@extends('master')
@section('title') Division Wise Selection @endsection
@section('page-title') Division Wise Selection @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division Wise Selection  @endsection

@section('content')
    <form action="{{ route('select-for-the-next-round') }}" id="form" method="POST">
        @csrf
        @include('exam.participant-selection.division.forms.select-category')

        <div id="ajaxResult"></div>
    </form>
@endsection

@section('custom-script')
    @include('exam.participant-selection.division.includes.script')
@endsection


