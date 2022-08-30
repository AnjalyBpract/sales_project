<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
{{-- <title>Add Company Form - Laravel 8 CRUD</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>

    <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-2 pull-left">
                        <h2>Add Profit/Loss</h2>
                    </div>
                     <div class="pull-right">
                    {{-- <a class="btn btn-primary" href="{{ route('profitreport.index') }}"> Back</a> --}}
                    </div>
             </div>
            </div>
            @if(session('status'))
                <div class="mt-1 mb-1 alert alert-success">
                    {{ session('status') }}
                </div>

            @endif
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('report') }}" method="GET" >
        <div class="container">
        <div class="row">
            <div class="form-group col-md-6">
                <strong>Start Date</strong>
            <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <div class="form-group col-md-6">
                <strong>End Date</strong>
            <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
        </div>
    </div>

            <div class="form-group col-md-6">
            <strong>Product Category:</strong>
            <label for="productcategory_id"></label>
            <select name="product_category_id" id="product_category_id" class="form-control">
                <option value="">select category</option>
            </select>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <strong>Product Name:</strong>
                <label for="product_id"></label>
                <select name="product_id" id="product_id" class="form-control">
                <option value="">select product</option>
            </select>
            </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </form>
</body>
</html>
