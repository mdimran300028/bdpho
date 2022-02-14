@extends('master')
@section('title') Participants @endsection
@section('page-title') Participant Reg. No. Edit Form @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division Wise Participants  @endsection

@section('content')
    <form action="{{ route('participant-reg-no-update') }}" method="POSt">
        @csrf
        @include('participants.edit.forms.select-division-and-category')
        <div id="ajaxResult"></div>
    </form>
@endsection

@section('custom-script')
    @include('participants.edit.includes.script')
@endsection


