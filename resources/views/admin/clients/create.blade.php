@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.clients.index') }}"><i class="glyphicon glyphicon-user position-left"></i> Clients</a></li>
                <li class="active">Create</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{ route('admin.clients.create') }}"><i class="glyphicon glyphicon-plus position-left"></i> Create new user</a></li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('admin.clients._form')
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/uploaders/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/uploader_bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".kv-fileinput-upload").remove();
        });
    </script>
@endsection