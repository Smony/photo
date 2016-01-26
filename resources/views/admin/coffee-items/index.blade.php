@extends('admin.layouts.master')

@section('header')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.coffeeItems.index') }}"><i class="icon-cup2 position-left"></i> Coffee items</a></li>
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

                    <div class="panel panel-flat">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Title</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <form method="POST" action="{{ route('admin.coffeeItems.update') }}" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <tr>
                                            <td>Coffee cups</td>
                                            <td>
                                                <div class="col-lg-3 pull-left">
                                                    <input type="text" name="coffee_cups" value="{{ old('coffee_cups', isset($coffeeItems['coffee_cups']) ? $coffeeItems['coffee_cups'] : '') }}" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </td>
                                            <td>Projects</td>
                                            <td>
                                                <div class="col-lg-3 pull-left">
                                                    <input type="text" name="projects" value="{{ old('projects', isset($coffeeItems['projects']) ? $coffeeItems['projects'] : '') }}" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Working days</td>
                                            <td>
                                                <div class="col-lg-3 pull-left">
                                                    <input type="text" name="working_days" value="{{ old('working_days', isset($coffeeItems['working_days']) ? $coffeeItems['working_days'] : '') }}" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </td>
                                            <td>Clients</td>
                                            <td>
                                                <div class="col-lg-3 pull-left">
                                                    <input type="text" name="clients" value="{{ old('clients', isset($coffeeItems['clients']) ? $coffeeItems['clients'] : '') }}" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection