@extends('master')
@section('title') Gallery @endsection
@section('page-title') Gallery @endsection
@section('breadcrumb-item') Dashboard @endsection
@section('active-breadcrumb-item') Gallery @endsection

@section('content')
    @include('gallery.tables.list')
    <!-- end row -->

    <!-- Include All Modals -->
    @include('gallery.modals.add-form')
    @include('gallery.modals.edit-form')
@endsection

@section('custom-script')
    @include('gallery.includes.script')
@endsection


