@extends('admin.layout.loginview')
@section('title', "Login")
@section('content')
<main>
    <div class="container">
        <h2 class="text-center">Login Form</h2>

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

             @if ($regisSuccess)
                <div class="alert alert-danger">
                    <h6>{{ $regisSuccess }}</h6>
                </div>
            @endif

        <form action="{{ route('admin.handleLogin') }}" class="form-horizontal" role="form" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-block" name="btnLogin">Login</button>
                </div>
            </div>
        </form>
    </div>
</main>


@endsection
