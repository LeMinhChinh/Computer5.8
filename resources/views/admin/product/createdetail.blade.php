@extends('admin.layout.dashboardview')
@section('title','Create Detail Product')

@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}">Product</a>
        </li>
        <li class="breadcrumb-item active">Create Detail</li>
    </ol>
    <div>
        <a href="{{ route('admin.listLaptop') }}" class="btn btn-primary">Back to List</a>
        <a href="{{ route('admin.createSpec') }}" class="btn btn-primary">Create Specification</a>
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

    @if ($insertError)
        <div class="alert alert-danger">
            <h6>{{ $insertError }}</h6>
        </div>
    @endif

    @if ($createSpecSuccess)
        <div class="alert alert-success">
            <h6>{{ $createSpecSuccess }}</h6>
        </div>
    @endif

    <form action="{{ route('admin.handleCreateDetail') }}"  method="POST" >
        @csrf
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3 mt-3">
                <div class="form-group">
                    <label for="namePr">Name Product (*)</label>
                    <select name="namePr" id="namePr" style="width:280px;margin-left:44px;height:35px;padding-left:30px">
                        <option value="">--- Choose Product ---</option>
                        @foreach ($namePr as $name)
                            <option value="{{ $name['id'] }}">{{ $name['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="typePr">Specification (*)</label>
                    <select name="specPr" id="specPr" style="width:280px;margin-left:56px;height:35px;padding-left:30px">
                        <option value="">--- Choose Specification ---</option>
                        @foreach ($spec as $item)
                            <option value="{{ $item['id'] }}">{{ $item['ram'] }} / {{ $item['cpu'] }} / {{ $item['hard_drive'] }} / {{ $item['color'] }} / {{ $item['screen'] }} / {{ $item['battery'] }} / {{ $item['operating_system'] }} / {{ $item['size'] }} / {{ $item['weight'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="desPr">Description</label>
                    <input type="text" class="form-control" id="desPr" name="desPr">
                </div>
                <div class="form-group">
                    <label for="qtyPr">Quantity (*)</label>
                    <input type="text" class="form-control" id="qtyPr" name="qtyPr">
                </div>
                <button type="submit" class="btn btn-primary" id="btnConfirm" name="btnConfirm" style="margin-left:40%;margin-bottom:20px">Confirm</button>
            </div>
    </form>
@endsection
