@extends('admin.layout.dashboardview')
@section('title','Create Specification')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.product') }}">Product</a>
        </li>
        <li class="breadcrumb-item active">Create Specification</li>
    </ol>
    <div>
        <a href="{{ route('admin.createProduct') }}" class="btn btn-primary">Back to Create Product</a>
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

    @if ($createSpecError)
        <div class="alert alert-danger">
            <h6>{{ $createSpecError }}</h6>
        </div>
    @endif

    <form action="{{ route('admin.handleCreateSpec') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 offset-md-3">
                <div class="form-group">
                    <label for="ramPr">Ram (*)</label>
                    <input type="text" class="form-control" id="ramPr" name="ramPr">
                </div>
                <div class="form-group">
                    <label for="cpuPr">CPU (*)</label>
                    <input type="text" class="form-control" id="cpuPr" name="cpuPr">
                </div>
                <div class="form-group">
                    <label for="hddPr">Hard Drive (*)</label>
                    <input type="text" class="form-control" id="hddPr" name="hddPr">
                </div>
                <div class="form-group">
                    <label for="colorPr">Color (*)</label>
                    <input type="text" class="form-control" id="colorPr" name="colorPr">
                </div>
                <div class="form-group">
                    <label for="screenPr">Screen (*)</label>
                    <input type="text" class="form-control" id="screenPr" name="screenPr">
                </div>
                <div class="form-group">
                    <label for="batteryPr">Battery (*)</label>
                    <input type="text" class="form-control" id="batteryPr" name="batteryPr">
                </div>
                <div class="form-group">
                    <label for="osPr">Operating system (*)</label>
                    <input type="text" class="form-control" id="osPr" name="osPr">
                </div>
                <div class="form-group">
                    <label for="sizePr">Size (*)</label>
                    <input type="text" class="form-control" id="sizePr" name="sizePr">
                </div>
                <div class="form-group">
                    <label for="weightpr">Weight (*)</label>
                    <input type="text" class="form-control" id="weightPr" name="weightPr">
                </div>
                <button type="submit" class="btn btn-primary" id="btnConfirm" name="btnConfirm" style="margin-left:40%;margin-bottom:20px">Confirm</button>
            </div>
    </form>
@endsection
