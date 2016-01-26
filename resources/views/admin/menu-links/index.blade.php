@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title"></div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.menuLinks.index') }}"><i class="icon-menu6 position-left"></i> Menu links</a></li>
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

            @include('admin.partials.messages')

        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Menu links
                        <a href="{{ route('admin.menuLinks.create') }}" class="btn btn-success pull-right" style="color: white">Create new menu-link</a>
                    </h5>
                </div>
                @if(count($menuLinks))
                    <hr>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>URL to</th>
                                    <th>Ordinal position</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menuLinks as $menuLink)
                                    <tr>
                                        <td>{{ $menuLink->getAttribute('title') != null ? mb_substr($menuLink->getAttribute('title'), 0 ,25) : '-' }}</td>
                                        <td>{{ $menuLink->getAttribute('value') != null ? mb_substr($menuLink->getAttribute('value'), 0 ,25) : '-' }}</td>
                                        <td>{{ $menuLink->getAttribute('ordinal_position') != null ? $menuLink->getAttribute('ordinal_position') : '-' }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <a class="btn btn-default" href="{{ route('admin.menuLinks.edit', ['pageItem' => $menuLink]) }}"><i class="icon-pencil6"></i> Edit</a>
                                                <a class="btn btn-default" href="{{ route('admin.menuLinks.destroy', ['pageItem' => $menuLink]) }}"><i class="icon-cross2"></i> Remove</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Social links</h5>
                </div>
                    <hr>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.menuLinks.updateSocialLinks') }}" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>URL to</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>Facebook</td>
                                        <td>
                                            <div class="col-lg-4 pull-left">
                                                <input type="text" name="facebook" value="{{ old('facebook', isset($socialLinks['facebook']) ? $socialLinks['facebook'] : '') }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Twitter</td>
                                        <td>
                                            <div class="col-lg-4 pull-left">
                                                <input type="text" name="twitter" value="{{ old('twitter', isset($socialLinks['twitter']) ? $socialLinks['twitter'] : '') }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pinterest</td>
                                        <td>
                                            <div class="col-lg-4 pull-left">
                                                <input type="text" name="pinterest" value="{{ old('pinterest', isset($socialLinks['pinterest']) ? $socialLinks['pinterest'] : '') }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td>
                                            <div class="col-lg-4 pull-left">
                                                <input type="text" name="instagram" value="{{ old('instagram', isset($socialLinks['instagram']) ? $socialLinks['instagram'] : '') }}" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            {!! $menuLinks !!}
        </div>
    </div>


@endsection