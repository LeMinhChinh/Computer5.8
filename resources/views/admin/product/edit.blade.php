@extends('admin.layout.dashboardview')
@section('title','Update Product Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}">Product</a>
        </li>
        <li class="breadcrumb-item active">Create Product</li>
    </ol>

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

    @if ($errorAvatar)
        <div class="alert alert-danger">
            <h6>{{ $errorAvatar }}</h6>
        </div>
    @endif

    @if ($updateProductError)
        <div class="alert alert-danger">
            <h6>{{ $updateProductError }}</h6>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div>
                <a href="{{ route('admin.product') }}" class="btn btn-primary" style="color:#fff">Back To List</a>
                <img src="{{ URL::to('/') }}/Uploads/images/{{ $info['image'] }}" alt="{{ $info['name'] }}" class="img-fluid"style="width:400px;height:350px;margin:45px">
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('admin.handleEditProduct',['id' => $info['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-1">
                        <div class="form-group">
                            <label for="namePr">Name (*)</label>
                            <input type="text" class="form-control" id="namePr" name="namePr" value="{{ $info['name'] }}">
                        </div>
                        <div class="form-group">
                            <label for="typePr">Type - Trade (*)</label>
                            <select name="typePr" id="typePr" style="width:280px;margin-left:56px;height:35px;padding-left:45px">
                                <option value="">--- Choose Type ---</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item['id'] }}" {{ $info['id_typetrade'] == $item['id'] ? 'selected=selected' : ''}}>{{ $item['name_type'] }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="typePr">Specification (*)</label>
                            <select name="specPr" id="specPr" style="width:280px;margin-left:56px;height:35px;padding-left:15px">
                                <option value="">--- Choose Specification ---</option>
                                    @foreach ($spec as $sp)
                                        <option value="{{ $sp['id'] }}" {{ $info['id_specification'] == $sp['id'] ? 'selected=selected' : '' }}>{{ $sp['ram'] }} / {{ $sp['cpu'] }} /  {{ $sp['color'] }} / {{ $sp['operating_system'] }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pricePr">Price (*)</label>
                            <input type="text" class="form-control" id="pricePr" name="pricePr" value="{{ $info['price'] }}">
                        </div>
                        <div class="form-group">
                            <label for="percentPr">Percent (*)</label>
                            <input type="text" class="form-control" id="percentPr" name="percentPr" value="{{ $info['percent'] }}">
                        </div>
                        <div class="form-group">
                            <label for="quantPr">Quantity (*)</label>
                            <input type="text" class="form-control" id="quantPr" name="quantPr" value="{{ $info['quantity'] }}">
                        </div>
                        <div class="form-group">
                            <label for="quantPr">Status (*)</label>
                            <input type="text" class="form-control" id="sttPr" name="sttPr" value="{{ $info['status'] }}">
                        </div>
                        <div class="form-group">
                            <label for="imgPr">Image (*)</label>
                            <input type="file" class="form-control" id="imgPr" name="imgPr">
                        </div>
                        <div class="form-group">
                            <label for="desPr">Description (*)</label>
                            <input type="text" class="form-control" id="desPr" name="desPr" value="{{ $info['description'] }}">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnConfirm" name="btnConfirm" style="margin-left:40%;margin-bottom:20px">Confirm</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
