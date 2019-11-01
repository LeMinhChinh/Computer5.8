@extends('admin.layout.dashboardview')
@section('title','Account')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Account</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="" class="btn btn-primary">Create New Product</a>
                <a href="" class="btn btn-primary">View All</a>
            </div> --}}
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Searching..." id="js-keyword" >
                        {{-- value="{{ $keyword }}" value of input--}}
                        <div class="input-group-append">
                            <button class="input-group-text" id="js-search">Search</button>
                        </div>
                    </div>
            </div>
        </div>


        <table class="table table-border table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width:110px">User name</th>
                    {{-- <th>Password</th> --}}
                    <th>Email</th>
                    <th>Full name</th>
                    <th style="width:136px">Phone number</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th colspan="2" width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstAccount as $key => $account)
                    <tr>
                        <td>{{ $account['id'] }}</td>
                        <td>
                            <p>{{ $account['username'] }}</p>
                        </td>
                        {{-- <td>
                            <p>{{ $account['password'] }}</p>
                        </td> --}}
                        <td>
                            <p>{{ $account['email'] }}</p>
                        </td>
                        <td>
                            <p>{{ $account['fullname'] }}</p>
                        </td>
                        <td>
                            <p>{{ $account['phone'] }}</p>
                        </td>
                        <td>
                            <p>{{ $account['age'] }}</p>
                        </td>
                        <td>
                            <p>{{ $account['address'] }}</p>
                        </td>
                        <td>
                            <img src="{{ URL::to('/') }}/Uploads/images/{{ $account['avatar'] }}" alt="" width="120" height="120" class="img-fluid">
                        </td>
                        <td>
                            @if ($account['role'] == 1)
                                <p>Admin</p>
                            @elseif($account['role'] == 0)
                                <p>Khách hàng</p>
                            @endif
                        </td>
                        <td>
                            @if ($account['status'] == 1)
                                <p>Active</p>
                            @elseif($account['status'] == 0)
                                <p>Unactive</p>
                            @endif
                        </td>
                        <td>
                            <button id="{{ $account['id'] }}" class="btn btn-sm btn-danger js-delete-post">Delete</button>
                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $paginate->appends(request()->query())->links() }} --}}
        {{-- {{ $paginate->links() }} --}}
    </div>
@endsection
