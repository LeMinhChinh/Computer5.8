@extends('admin.layout.dashboardview')
@section('title','Update Account Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.account') }}">Account</a>
        </li>
        <li class="breadcrumb-item active">Update Account</li>
    </ol>

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

    @if ($updateAccountError)
        <div class="alert alert-danger">
            <h6>{{ $updateAccountError }}</h6>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div>
                <a href="{{ route('admin.account') }}" class="btn btn-primary" style="color:#fff">Back To List</a>
                <img src="{{ URL::to('/') }}/Uploads/images/{{ $info['avatar'] }}" class="img-fluid"style="width:400px;height:350px;margin:45px">
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('admin.handleEditAccount',['id' => $info['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-1">
                        <div class="form-group">
                            <label for="userAcc">Username (*)</label>
                            <input type="text" class="form-control" id="userAcc" name="userAcc" value="{{ $info['username'] }}" readonly >
                        </div>
                        <div class="form-group">
                            <label for="emailAcc">Email (*)</label>
                            <input type="text" class="form-control" id="emailAcc" name="emailAcc" value="{{ $info['email'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fnameAcc">Full name (*)</label>
                            <input type="text" class="form-control" id="fnameAcc" name="fnameAcc" value="{{ $info['fullname'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phoneAcc">Phone number (*)</label>
                            <input type="text" class="form-control" id="phoneAcc" name="phoneAcc" value="{{ $info['phone'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="genAcc">Gender (*)</label>
                            <input type="text" class="form-control" id="genAcc" name="genAcc" value="{{ $info['gender'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ageAcc">Age (*)</label>
                            <input type="text" class="form-control" id="ageAcc" name="ageAcc" value="{{ $info['age'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="addAcc">Address (*)</label>
                            <input type="text" class="form-control" id="addAcc" name="addAcc" value="{{ $info['address'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="roleAcc">Role (*)</label>
                            <input type="text" class="form-control" id="roleAcc" name="roleAcc" value="{{ $info['role'] }}">
                        </div>
                        <div class="form-group">
                            <label for="sttAcc">Status (*)</label>
                            <input type="text" class="form-control" id="sttAcc" name="sttAcc" value="{{ $info['status'] }}">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnUpdate" name="btnUpdate" style="margin-left:40%;margin-bottom:20px">Confirm</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
