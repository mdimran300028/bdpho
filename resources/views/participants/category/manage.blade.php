@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant List @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') District Wise Participants  @endsection

@section('content')
    @include('participants.category.forms.select-category')

    <div id="ajaxResult">
        @include('participants.category.tables.list')
    </div>
    <!-- Include All Modals -->
{{--    @include('participants.category.modals.add-form')--}}
{{--    @include('participants.category.modals.edit-form')--}}
@endsection

@section('custom-script')
    @include('participants.category.includes.script')
@endsection


