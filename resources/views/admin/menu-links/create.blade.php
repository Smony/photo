@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.menuLinks.index') }}"><i class="icon-menu6 position-left"></i> Menu links</a></li>
                <li class="active">Create new link</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="{{ route('admin.menuLinks.create') }}"><i class="icon-file-plus position-left"></i> Create new link</a></li>
            </ul>
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    @include('admin.partials.messages')
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('admin.menuLinks.store') }}" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Create new link</h5>
                                <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                                <hr>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">URL:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="url_to" value="{{ old('url_to', url() . '/') }}" class="form-control" placeholder="URL">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Ordinal position:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ordinal_position" value="{{ old('ordinal_position') }}" class="form-control" placeholder="Ordinal position">
                                    </div>
                                </div>

                                <div class="col-lg-9 col-lg-offset-3">
                                    @include('admin.partials.errors')
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">Submit</button>
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