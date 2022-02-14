@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant List @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') District Wise Participants  @endsection

@section('content')
    @include('participants.district.forms.select-district-and-category')

    <div id="ajaxResult">
        @include('participants.district.tables.list')
    </div>
    <!-- Include All Modals -->
    @include('participants.district.modals.add-form')
    @include('participants.district.modals.edit-form')
@endsection

@section('custom-script')
    @include('participants.district.includes.script')
@endsection


