@extends('admin.layout.loginview')
@section('title', "Login")
@section('content')

<div class="container">
        <h2 class="text-center">Registration Form</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($messages)
                <div class="alert alert-danger">
                    <h6>{{ $messages }}</h6>
                </div>
            @endif

            @if ($regisError)
                <div class="alert alert-danger">
                    <h6>{{ $regisError }}</h6>
                </div>
            @endif

    <form action="{{ route('admin.handleRegister') }}" class="form-horizontal" role="form" method="POST">
        @csrf
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="text" id="txtEmail" name="txtEmail" placeholder="Email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">RePassword</label>
            <div class="col-sm-9">
                <input type="password" id="txtRePassword" name="txtRePassword" placeholder="RePassword" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">User Name</label>
            <div class="col-sm-9">
                <input type="text" id="txtName" name="txtName" placeholder="User Name" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Full Name</label>
            <div class="col-sm-9">
                <input type="text" id="txtFName" name="txtFName" placeholder="Full Name" class="form-control" autofocus>
            </div>
        </div>
       <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
                <input type="text" id="txtPhone" name="txtPhone" placeholder="Phone Number" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
            <div class="col-sm-9">
                <input type="date" id="txtBirth" name="txtBirth" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
                <input type="text" id="txtAddress" name="txtAddress" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Gender</label>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="femaleRadio" name="gender" value="0">Nữ
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" id="maleRadio" name="gender" value="1">Nam
                        </label>
                    </div>
                </div>
            </div>
        </div> <!-- /.form-group -->
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block" name="btnRegis">Register</button>
            </div>
        </div>
    </form>

</div>

@endsection
