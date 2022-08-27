<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{-- <title>Edit Company Form - Laravel 8 CRUD Tutorial</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Products</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
        @if(session('status'))
            <div class="mt-1 mb-1 alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Company name">
            @error('name')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Purchase Price</strong>
                <input type="text" name="purchase_price" value="{{ $product->purchase_price }}" class="form-control" placeholder="Purchase Price">
            @error('purchase_price')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sale Price</strong>
                <input type="text" name="sale_price" value="{{ $product->sale_price }}" class="form-control" placeholder="Sale Price">
            @error('sale_price')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="4">{{ $product->description }}</textarea>

</div>
    </div>

<div>
    <div class="mt-3 form-check form-check-inline">
        <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="1" checked>
        <label class="form-check-label" for="inlineRadio1">Active</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="active"  value="2" id="inlineRadio2">
        <label class="form-check-label" for="inlineRadio2">Not Active</label>
      </div>
    </div>
    <button type="submit" class="ml-3 btn btn-primary">Submit</button>
</div>
</form>
</div>
</body>
</html>
