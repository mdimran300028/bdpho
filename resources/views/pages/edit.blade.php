@extends('master')
@section('title') Pages @endsection
@section('page-title') Pages Edit Form <a href="{{ route('pages') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a> @endsection
@section('breadcrumb-item') Dashboards @endsection
@section('active-breadcrumb-item') Pages @endsection

@section('content')
    @include('pages.modals.edit-form')
    <!-- end row -->
@endsection

@section('custom-script')
    @include('pages.includes.script')
@endsection


