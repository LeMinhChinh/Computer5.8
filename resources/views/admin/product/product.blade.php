@extends('admin.layout.dashboardview')
@section('title','Product Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}" style="text-decoration:none">Product</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    @if($createProductSuccess)
		<div class="alert alert-success my-3">
			<h6>{{ $createProductSuccess }}</h6>
		</div>
    @endif

    @if($updateProductSuccess)
		<div class="alert alert-success my-3">
			<h6>{{ $updateProductSuccess }}</h6>
		</div>
    @endif

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                <a href="{{ route('admin.createProduct') }}" class="btn btn-primary">New Product</a>
                <a href="{{ route('admin.product') }}" class="btn btn-primary">View All</a>
            </div>

            {{-- <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="dropdown"  style="margin-left:-269px">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Filter Product
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" style="text-decoration:none;padding-left:15px">Trademark</a></li>
                        <li><a href="#" style="text-decoration:none;padding-left:15px">Price</a></li>
                        <li><a href="#" style="text-decoration:none;padding-left:15px">Quantity</a></li>
                    </ul>
                </div>
            </div> --}}
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


        <table class="table table-border table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type product</th>
                    <th>Trademark</th>
                    <th>Price</th>
                    <th>Percent</th>
                    <th>Price promo</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstProduct as $key => $product)
                    <tr class="js-product-{{ $product['id'] }}">
                        <td>{{ $product['id'] }}</td>
                        <td>
                            <p>{{ $product['name'] }}</p>
                        </td>
                        <td>
                            <p>{{ $product['type'] }}</p>
                        </td>
                        <td>
                            <p>{{ $product['name_trade'] }}</p>
                        </td>
                        <td>
                            <p>{{ $product['price'] }}</p>
                        </td>
                        <td>
                            <p>{{ $product['percent'] }}%</p>
                        </td>
                        <td>
                            <p>{{ $product['promo_price'] }}</p>
                        </td>
                        <td>
                            @if ($product['id_type'] == 1)
                                <img src="{{ URL::to('/') }}/Uploads/images/{{ $product['image'] }}" alt="" width="120" height="120" class="img-fluid">
                            @elseif($product['id_type'] == 2)
                                <img src="{{ URL::to('/') }}/Uploads/images/{{ $product['image'] }}" alt="" width="120" height="120" class="img-fluid">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.editProduct',['id' => $product['id']]) }}" class="btn btn-info btn-sm">Update</a>
                        </td>
                        <td>
                            <button id="{{ $product['id'] }}" class="btn btn-sm btn-danger js-delete-product">Delete</button>
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
            $('.js-delete-product').click(function() {
                var self = $(this);
                var idProduct = self.attr('id').trim();
                if($.isNumeric(idProduct)){
                    $.ajax({
                        url: "{{ route('admin.deleteProduct') }}",
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

            $('#js-search').click(function(){
                var keyword = $('#js-keyword').val().trim();
                if(keyword.length > 0){
                    window.location.href =  "{{ route('admin.product') }}" + "?keyword=" + keyword;
                }
            });
        });
    </script>
@endpush
