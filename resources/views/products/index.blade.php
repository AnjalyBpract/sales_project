<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2>Add Product</h2>
                    </div>
                    <div class="mb-2 pull-right">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create Product</a>

            <div class="mb-2 text-right col-md-16 bg-light">
                <a class="btn btn-primary" href="{{ url('/dashboard') }}"> dashbord</a>

        </div>
        </div>
    </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
    <table class="table table-bordered">
    <tr>
        <th>S.No</th>
        <th>Product Category </th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Prchase Price</th>
        <th>Product Sale Price</th>

        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
        @foreach ($datas as $item)

                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->product_category->name}}</td>
                <td>{{ $item->name}}</td>

                <td>{{ $item->description }}</td>
                <td>{{ $item->purchase_price }}</td>
                <td>{{ $item->sale_price }}</td>
                {{-- <td>{{ $item->product_category_name }}</td> --}}
                <td>@if($item->active == 1)active @else not in active @endif</td>
                <td>
                <form action="{{ route('products.destroy',$item->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('products.edit',$item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
             </tr>

            @endforeach
</table>

</body>
</html>
