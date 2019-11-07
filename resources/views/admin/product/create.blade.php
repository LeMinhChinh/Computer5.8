@extends('admin.layout.dashboardview')
@section('title','Create Product')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}">Product</a>
        </li>
        <li class="breadcrumb-item active">Create Product</li>
    </ol>
    <div>
            <a href="{{ route('admin.product') }}" class="btn btn-primary">Back to List</a>
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

    @if ($createProductError)
        <div class="alert alert-danger">
            <h6>{{ $createProductError }}</h6>
        </div>
    @endif

    @if ($errImage)
        <div class="alert alert-danger">
            <h6>{{ $errImage }}</h6>
        </div>
    @endif

    {{-- @if ($createSpecSuccess)
        <div class="alert alert-danger">
            <h6>{{ $createSpecSuccess }}</h6>
        </div>
    @endif --}}

    <form action="{{ route('admin.handleCreateProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3">
                <div class="form-group">
                    <label for="namePr">Name (*)</label>
                    <input type="text" class="form-control" id="namePr" name="namePr">
                </div>
                <div class="form-group">
                    <label for="typePr">Type - Trade (*)</label>
                    <select name="typePr" id="typePr" style="width:280px;margin-left:56px;height:35px;padding-left:45px">
                        <option value="">--- Choose Type ---</option>
                        @foreach ($typetrade as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name_type'] }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group">
                    <label for="typePr">Specification (*)</label>
                    <select name="specPr" id="specPr" style="width:280px;margin-left:56px;height:35px;padding-left:15px">
                        <option value="">--- Choose Specification ---</option>
                        @foreach ($spec as $sp)
                        <option value="{{ $sp['id'] }}">{{ $sp['ram'] }} / {{ $sp['cpu'] }} /  {{ $sp['color'] }} / {{ $sp['operating_system'] }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="pricePr">Price (*)</label>
                    <input type="text" class="form-control" id="pricePr" name="pricePr">
                </div>
                <div class="form-group">
                    <label for="percentPr">Percent (*)</label>
                    <input type="text" class="form-control" id="percentPr" name="percentPr">
                </div>
                <div class="form-group">
                    <label for="quantPr">Quantity (*)</label>
                    <input type="text" class="form-control" id="quantPr" name="quantPr">
                </div>
                <div class="form-group">
                    <label for="imgPr">Image (*)</label>
                    <input type="file" class="form-control" id="imgPr" name="imgPr">
                </div>
                {{-- <div class="form-group">
                    <label for="desPr">Description (*)</label>
                    <input type="text" class="form-control" id="desPr" name="desPr">
                </div> --}}
                <button type="submit" class="btn btn-primary" id="btnConfirm" name="btnConfirm" style="margin-left:40%;margin-bottom:20px">Confirm</button>
            </div>
    </form>
@endsection
