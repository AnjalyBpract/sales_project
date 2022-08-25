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
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create Users</a>
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
        <th>Name</th>
        <th>Description</th>
        <th>Prchase Price</th>
        <th>Sale Price</th>
        <th>Product Category Id</th>
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
            @foreach ($products as $product)
                <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->sale_price }}</td>
                <td>{{ $product->product_category_id }}</td>
                <td>@if($product->active == 1)active @else not in active @endif</td>
                <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
    </tr>
            @endforeach
</table>
{!! $products->links() !!}
</body>
</html>
