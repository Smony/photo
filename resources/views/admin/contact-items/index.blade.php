@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.contactItems.index') }}"><i class="icon-question3 position-left"></i> Contact items</a></li>
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
                    <div class="row">

                        <div class="col-lg-7">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Contact items
                                    </h5>
                                </div>

                                <hr>
                                <div class="panel-body">
                                    <form method="POST" action="{{ route('admin.contactItems.update') }}" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Phone number</td>
                                                        <td>
                                                            <div class="col-lg-4 pull-left">
                                                                <input type="text" name="phone_number" value="{{ old('phone_number', isset($contactItems['phone_number']) ? $contactItems['phone_number'] : '') }}" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>E-mail</td>
                                                        <td>
                                                            <div class="col-lg-4 pull-left">
                                                                <input type="text" name="email" value="{{ old('email', isset($contactItems['email']) ? $contactItems['email'] : '') }}" class="form-control">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>
                                                            <div class="col-lg-4 pull-left">
                                                                <input type="text" name="address" value="{{ old('address', isset($contactItems['address']) ? $contactItems['address'] : '') }}" class="form-control">
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

                        <div class="col-lg-5">
                            <div class="panel panel-flat">
                                <div class="panel-heading text-center">
                                    <h5>Site title</h5>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="{{ route('admin.contactItems.updateSiteTitle') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" value="{{ old('title', $siteTitle['title']) }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ trans('Update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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