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
                <li class="active">Edit link</li>
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
                    <form method="POST" action="{{ route('admin.menuLinks.update', ['pageItem' => $menuLink]) }}" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Edit item</h5>
                                <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
                                <hr>
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="title" value="{{ old('title', $menuLink->getAttribute('title')) }}" class="form-control" placeholder="Title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="url_to" value="{{ old('url_to', $menuLink->getAttribute('value')) }}" class="form-control" placeholder="Meta">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Ordinal position:</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="ordinal_position" value="{{ old('ordinal_position', $menuLink->getAttribute('ordinal_position')) }}" class="form-control" placeholder="Ordinal position">
                                    </div>
                                </div>

                                <div class="col-lg-9 col-lg-offset-3">
                                    @include('admin.partials.errors')
                                </div>

                                <div class="text-right">
                                    <a class="btn btn-danger" href="{{ route('admin.menuLinks.destroy', ['pageItem' => $menuLink]) }}"><i class="icon-cross2"></i> Remove</a>
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