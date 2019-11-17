@extends('admin.layout.dashboardview')
@section('title','Laptop Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}" style="text-decoration:none">Product</a>
        </li>
        <li class="breadcrumb-item active">Laptop</li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a href="{{ route('admin.createDetail') }}" class="btn btn-primary">New Detail</a>
                <a href="{{ route('admin.listLaptop') }}" class="btn btn-primary">View All</a>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Searching for..." id="js-keyword" value="{{ $keyword }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="js-search">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if ($updateSuccess)
            <div class="alert alert-success">
                <h6>{{ $updateSuccess }}</h6>
            </div>
        @endif

        @if ($insertSuccess)
            <div class="alert alert-success">
                <h6>{{ $insertSuccess }}</h6>
            </div>
        @endif

        <table class="table table-border table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Ram</th>
                    <th>CPU</th>
                    <th>Hard Drive</th>
                    <th>Color</th>
                    <th>Screen</th>
                    <th>Battery</th>
                    <th>Operating System</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Quantity</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstLaptop as $key => $laptop)
                    <tr class="js-product-{{ $laptop['id'] }}">
                        <td>{{ $laptop['id'] }}</td>
                        <td>
                            <p>{{ $laptop['name'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['ram'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['cpu'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['hard_drive'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['color'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['screen'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['battery'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['operating_system'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['size'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['weight'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['quantity'] }}</p>
                        </td>
                        <td>
                            <a href="{{ route('admin.editDetailPr',['id' => $laptop['id']]) }}" class="btn btn-info btn-sm">Update</a>
                        </td>
                        <td>
                            <button id="{{ $laptop['id'] }}" class="btn btn-sm btn-danger js-delete-dtproduct">Delete</button>
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
            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                if(keyword.length > 0){
                    window.location.href =  "{{ route('admin.listLaptop') }}" + "?keyword=" + keyword;
                }
            });

            $('.js-delete-dtproduct').click(function() {
                var self = $(this);
                var idProduct = self.attr('id').trim();
                if($.isNumeric(idProduct)){
                    $.ajax({
                        url: "{{ route('admin.deleteDetail') }}",
                        type: "POST",
                        data: {id: idProduct},
                        beforeSend: function(){
                            self.text('Loading ...');
                        },
                        success: function(data){
                            self.text('Delete');
                            if(data === 'Error' || data === 'Fail'){
                                alert('Có lỗi xảy ra')
                            } else {
                                $('.js-product-'+idProduct).hide();
                                alert('Xóa sản phẩm thành công');
                            }
                        }
                    });
                }
            });

        });
    </script>
@endpush
