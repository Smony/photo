@extends('client.layouts.limitless-master')

@section('content')
        <!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Registration form -->
                <form method="POST" action="{{ route('client.auth.postRegister') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                        <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                                    </div>

                                    <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Choose username">
                                        <div class="form-control-feedback">
                                            <i class="icon-user-plus text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First name">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback {{ $errors->has('second_name') ? 'has-error' : '' }}">
                                                <input type="text" name="second_name" value="{{ old('second_name') }}" class="form-control" placeholder="Second name">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-check text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                                <input type="password" name="password" class="form-control" placeholder="Create password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password">
                                                <div class="form-control-feedback">
                                                    <i class="icon-user-lock text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Your email">
                                        <div class="form-control-feedback">
                                            <i class="icon-mention text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {{--<div class="checkbox">--}}
                                            {{--<label>--}}
                                                {{--<input type="checkbox" class="styled" checked="checked">--}}
                                                {{--Send me <a href="#">test account settings</a>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}

                                        {{--<div class="checkbox">--}}
                                            {{--<label>--}}
                                                {{--<input type="checkbox" class="styled" checked="checked">--}}
                                                {{--Subscribe to monthly newsletter--}}
                                            {{--</label>--}}
                                        {{--</div>--}}

                                        {{--<div class="checkbox">--}}
                                            {{--<label>--}}
                                                {{--<input type="checkbox" class="styled">--}}
                                                {{--Accept <a href="#">terms of service</a>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    </div>

                                    @include('client.partials.errors')

                                    <div class="text-right">
                                        <a href="{{ route('client.auth.getLogin') }}" style="color: black;"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /registration form -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
@endsection