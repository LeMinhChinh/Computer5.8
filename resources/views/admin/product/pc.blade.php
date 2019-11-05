@extends('admin.layout.dashboardview')
@section('title','Laptop Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}" style="text-decoration:none">Product</a>
        </li>
        <li class="breadcrumb-item active">PC</li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <a href="{{ route('admin.listpc') }}" class="btn btn-primary">View All</a>
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
                    <th>Ram</th>
                    <th>CPU</th>
                    <th>Hard Drive</th>
                    <th>Color</th>
                    <th>Screen</th>
                    <th>Battery</th>
                    <th>Operating System</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lstPc as $key => $pc)
                    <tr>
                            <td>{{ $pc['id'] }}</td>
                            <td>
                                <p>{{ $pc['name'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['ram'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['cpu'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['hard_drive'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['color'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['screen'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['battery'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['operating_system'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['size'] }}</p>
                            </td>
                            <td>
                                <p>{{ $pc['weight'] }}</p>
                            </td>
                            <td>
                                <button id="" class="btn btn-sm btn-primary">Update</button>
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
                    window.location.href =  "{{ route('admin.listpc') }}" + "?keyword=" + keyword;
                }
            });
        });
    </script>
@endpush
