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
                @foreach ($lstLaptop as $key => $laptop)
                    <tr>
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
                            <a href="{{  route('admin.editDetail',['id' => $laptop['id']]) }}" class="btn btn-sm btn-primary">Update</a>
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
