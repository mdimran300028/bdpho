@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant List @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') District Wise Participants  @endsection

@section('content')
    <div id="ajaxResult">
        @include('site-info.tables.list')
    </div>
    <!-- Include All Modals -->
    @include('site-info.modals.add-form')
    @include('site-info.modals.edit-form')
@endsection

@section('custom-script')
    @include('site-info.includes.script')
@endsection


