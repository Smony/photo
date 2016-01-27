<form method="POST" action="{{ route('admin.administrators.store') }}" class="form-horizontal" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Create a new Administrator</h5>
            <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
            <hr>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">User Name:</label>
                <div class="col-lg-9">
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="user name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">First Name:</label>
                <div class="col-lg-9">
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="first name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Second Name:</label>
                <div class="col-lg-9">
                    <input type="text" name="second_name" value="{{ old('second_name') }}" class="form-control" placeholder="second name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-9">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
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
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</form>