@extends('master')
@section('title') SMS @endsection
@section('page-title') Division Wise SMS Form @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Division Wise SMS @endsection

@section('content')
    <form action="{{ route('division-wise-sms-send') }}" method="POSt">
        @csrf
        @include('participants.sms.forms.select-division-and-category')
        <div id="ajaxResult"></div>
    </form>
@endsection

@section('custom-script')
    @include('participants.sms.includes.script')
@endsection


