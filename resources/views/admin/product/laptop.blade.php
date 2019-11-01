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
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="{{ route('admin.listLaptop') }}" class="btn btn-primary">View All</a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Searching..." id="js-keyword" value="{{ $keyword }}">
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
                    <th>Name</th>
                    <th>Trademark</th>
                    <th>Price</th>
                    <th>Percent</th>
                    <th>Price promo</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstLaptop as $key => $laptop)
                    <tr>
                        <td>{{ $laptop['id'] }}</td>
                        <td>
                            <p>{{ $laptop['name'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['name_trade'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['price'] }}</p>
                        </td>
                        <td>
                            <p>{{ $laptop['percent'] }}%</p>
                        </td>
                        <td>
                            <p>{{ $laptop['promo_price'] }}</p>
                        </td>
                        <td>
                            <img src="{{ URL::to('/') }}/Uploads/images/{{ $laptop['image'] }}" alt="" width="120" height="120" class="img-fluid">
                        </td>
                        <td>{{ $laptop['quantity'] }}</td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Edit Detail</a>
                        </td>
                        <td>
                            <button id="" class="btn btn-sm btn-danger js-delete-post">Insert Detail</button>
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
        });
    </script>
@endpush
