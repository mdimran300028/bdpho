@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant List @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division Wise Participants  @endsection

@section('content')
    @include('participants.division.forms.select-division-and-category')

    <div id="ajaxResult">
{{--        @include('participants.division.tables.list')--}}
    </div>
    <!-- Include All Modals -->
    @include('participants.division.modals.add-form')
    @include('participants.division.modals.edit-form')
@endsection

@section('custom-script')
    @include('participants.division.includes.script')
@endsection


