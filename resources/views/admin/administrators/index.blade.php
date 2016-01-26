@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title"></div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.administrators.index') }}"><i class="glyphicon glyphicon-user position-left"></i> Administrators</a></li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="scripts:void();"><i class="glyphicon glyphicon-plus position-left"></i> Add new Administrator</a></li>
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
        <div class="col-lg-12">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Administrators
                        <a href="scripts:void();" class="btn btn-success pull-right" style="color: white">Add new Administrator</a>
                    </h5>
                </div>

                @if(count($getAdministrators))
                    <hr>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Second Name</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($getAdministrators as $itemAdministrators)
                                    <tr>
                                        <td>{{ $itemAdministrators->getAttribute('username') != null ? mb_substr($itemAdministrators->getAttribute('username'), 0 ,25) : '-' }}</td>
                                        <td>{{ $itemAdministrators->getAttribute('first_name') != null ? mb_substr($itemAdministrators->getAttribute('first_name'), 0 ,25) : '-' }}</td>
                                        <td>{{ $itemAdministrators->getAttribute('second_name') != null ? $itemAdministrators->getAttribute('second_name') : '-' }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <a class="btn btn-default" href="scripts:void();"><i class="glyphicon glyphicon-envelope"></i> Send message</a>
                                                <a class="btn btn-default" href="scripts:void();"><i class="icon-pencil6"></i> Edit</a>
                                                <a class="btn btn-default" href="scripts:void();"><i class="icon-cross2"></i> Remove</a>
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
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/media/fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/gallery_library.js') }}"></script>
@endsection
