<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{-- <title>Edit Company Form - Laravel 8 CRUD Tutorial</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vendor</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customers.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
        @if(session('status'))
            <div class="mt-1 mb-1 alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
                <input type="text" name="name" value="{{ $customer->name }}" class="form-control" placeholder="Company name">
            @error('name')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address</strong>
                <input type="text" name="address" value="{{ $customer->address }}" class="form-control" >
            @error('address')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email</strong>
                <input type="email" name="email" value="{{ $customer->email }}" class="form-control" >
            @error('email')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password</strong>
                <input type="password" name="password" value="{{ $customer->password }}" class="form-control" >
            @error('password')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
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
