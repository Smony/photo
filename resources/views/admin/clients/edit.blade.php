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
                <li class="active">Edit</li>
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
            <div class="panel panel-flat">

                <form method="POST" action="{{ route('admin.clients.update', ['getClients' => $itemClient]) }}" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit Client</h5>
                            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                            <hr>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">User Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="username" value="{{ old('username', $itemClient->getAttribute('username')) }}" class="form-control" placeholder="user name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">First Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="first_name" value="{{ old('first_name', $itemClient->getAttribute('first_name')) }}" class="form-control" placeholder="first name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Second Name:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="second_name" value="{{ old('second_name', $itemClient->getAttribute('second_name')) }}" class="form-control" placeholder="second name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="email" value="{{ old('email', $itemClient->getAttribute('email')) }}" class="form-control" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Create Password:</label>
                                <div class="col-lg-9">
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="create password">
                                </div>
                            </div>

                            <div class="col-lg-9 col-lg-offset-3">
                                @include('admin.partials.errors')
                            </div>

                            <div class="text-right">
                                <a class="btn btn-danger" href="scripts:void();"><i class="icon-cross2"></i> Remove</a>
                                <button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>


                </div>

            </div>
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


