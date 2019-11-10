@extends('admin.layout.dashboardview')
@section('title','Account')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.bill') }}">Bill Order</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a href="" class="btn btn-primary">View All</a>
            </div>
            {{-- <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>

        @if ($updateSuccess)
            <div class="alert alert-success">
                <h6>{{ $updateSuccess }}</h6>
            </div>
        @endif

        <table class="table table-border table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Id User</th>
                    <th>Full name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Note</th>
                    {{-- <th colspan="2" width="5%">Action</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $or)
                    <tr  class="js-bill-{{ $or['id'] }}">
                        <td>
                            <p>{{ $or['id'] }}</p>
                        </td>
                        <td>
                            <p>{{ $or['id_acc'] }}</p>
                        </td>
                        <td>
                            <p>{{ $or['fullname'] }}</p>
                        </td>
                        <td>
                            <p>{{ $or['phone'] }}</p>
                        </td>
                        <td>
                            <p>{{ $or['email'] }}</p>
                        </td>
                        <td>
                            <p>{{ $or['address'] }}</p>
                        </td>
                        <td>
                            @if ($or['payment'] == 1)
                                <p>Thanh toán trực tiếp</p>
                            @elseif($or['role'] == 0)
                                <p>Thanh toán qua ngân hàng</p>
                            @endif
                        </td>
                        <td>
                            @if ($or['status'] == 1)
                                <p>Đã duyệt</p>
                            @elseif($or['status'] == 0)
                                <p>Đang chờ duyệt</p>
                            @endif
                        </td>
                        <td>
                            <p>{{ number_format($or['total'] ,0 ,'.' ,'.').'' }}&#8363;</p>
                        </td>
                        <td>
                            <p>{{ $or['note'] }}</p>
                        </td>
                        <td>
                            <a href="{{ route('admin.editBill',['id' => $or['id']]) }}" class="btn btn-info">Approval</a>
                        </td>
                        {{-- <td>
                            <button id="{{ $or['id'] }}" class="btn btn-sm btn-danger js-delete-bill">Delete</button>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $paginate->appends(request()->query())->links() }} --}}
        {{-- {{ $paginate->links() }} --}}
    </div>
@endsection

{{-- @push('scripts')
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
@endpush --}}
