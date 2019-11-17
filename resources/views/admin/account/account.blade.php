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
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a href="" class="btn btn-primary">View All</a>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if ($updateAccountSuccess)
            <div class="alert alert-success">
                <h6>{{ $updateAccountSuccess }}</h6>
            </div>
        @endif

        <table class="table table-border table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th style="width:110px">User name</th>
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
                    <tr class="js-account-{{ $account['id'] }}">
                        <td>{{ $account['id'] }}</td>
                        <td>
                            <p>{{ $account['username'] }}</p>
                        </td>
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
                            <img src="{{ URL::to('/') }}/Uploads/avatar/{{ $account['avatar'] }}" alt="" width="120" height="120" class="img-fluid">
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
                            <a href="{{ route('admin.editAccount',['id' => $account['id']]) }}" class="btn btn-info">Update</a>
                        </td>
                        <td>
                            <button id="{{ $account['id'] }}" class="btn btn-danger js-delete-account">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-left:45%">
            {{ $paginate->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.js-delete-account').click(function() {
                var self = $(this);
                var idAccount = self.attr('id').trim();
                if($.isNumeric(idAccount)){
                    $.ajax({
                        url: "{{ route('admin.deleteAccount') }}",
                        type: "POST",
                        data: {id: idAccount},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            self.text('Delete');
                            if(data === 'Error' || data === 'Fail'){
                                alert('Có lỗi xảy ra')
                            } else {
                                $('.js-account-'+idAccount).hide();
                                alert('Xóa tài khoản thành công');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
