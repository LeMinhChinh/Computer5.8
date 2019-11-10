@extends('admin.layout.dashboardview')
@section('title','Update Detail Product Admin')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}">Product</a>
        </li>
        <li class="breadcrumb-item active">Update Detail Product</li>
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

    @if ($updateError)
        <div class="alert alert-danger">
            <h6>{{ $updateError }}</h6>
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div>
                <a href="{{ route('admin.product') }}" class="btn btn-primary" style="color:#fff">Back To List</a>
                <img src="{{ URL::to('/') }}/Uploads/images/{{ $info['image'] }}" class="img-fluid"style="width:400px;height:350px;margin:45px">
            </div>
        </div>
        <div class="col-md-8">
            <form action="{{ route('admin.handleEditDetailPr',['id' => $info['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 offset-md-1">
                        <div class="form-group">
                            <label for="namePr">Name</label>
                            <input type="text" class="form-control" id="namePr" name="namePr" value="{{ $info['name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="specPr">Specification (*)</label>
                            <select name="specPr" id="specPr" style="width:280px;margin-left:40px;height:35px;padding-left:30px">
                                <option value="">--- Choose Specification ---</option>
                                    @foreach ($spec as $item)
                                        <option value="{{ $item['id'] }}" {{ $info['id_specification'] == $item['id'] ? 'selected=selected' : ''}}>{{ $item['ram'] }} / {{ $item['cpu'] }} / {{ $item['color'] }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qtyPr">Quantiy (*)</label>
                            <input type="text" class="form-control" id="qtyPr" name="qtyPr" value="{{ $info['quantity'] }}">
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
