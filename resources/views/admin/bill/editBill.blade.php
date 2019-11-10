@extends('admin.layout.dashboardview')
@section('title','Update Account Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.account') }}">Account</a>
        </li>
        <li class="breadcrumb-item active">Update Bill</li>
    </ol>
    <div>
        <a href="{{ route('admin.bill') }}" class="btn btn-primary" style="color:#fff">Back To List</a>
    </div>

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

    @if ($updateError)
        <div class="alert alert-danger">
            <h6>{{ $updateError }}</h6>
        </div>
    @endif

    <div class="row">

        <div class="col-md-8">
            <form action="{{ route('admin.handleEditBill',['id' => $info['id']]) }}" method="POST">
                @csrf
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-5">
                        <div class="form-group">
                            <label for="fname">Fullname</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="{{ $info['fullname'] }}" readonly >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $info['email'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $info['phone'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $info['address'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" id="total" name="total" value="{{ $info['total'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <br>
                            <label class="radio-inline">
                                <input name="status" value="0" type="radio" @if($info['status'] == 0 ) checked="" @endif >Đang chờ duyệt
                            </label>
                            <label class="radio-inline" style="margin-left:40px">
                                <input name="status" value="1" type="radio"  @if($info['status']== 1 ) checked="" @endif >Duyệt đơn hàng
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnUpdate" name="btnUpdate" style="margin-left:40%;margin-bottom:20px">Confirm</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
