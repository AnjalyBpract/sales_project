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
                    <h2>Add Product Category</h2>
                    </div>
                    <div class="mb-2 pull-right">
                    <a class="btn btn-success" href="{{ route('product_categories.create') }}"> Create Users</a>
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
        <th>Active</th>
        <th width="280px">Action</th>
    </tr>
            @foreach ($product_categories as $product_category)
                <tr>
                <td>{{ $product_category->id }}</td>
                <td>{{ $product_category->name }}</td>
                <td>{{ $product_category->description }}</td>
                <td>@if($product_category->active == 1)active @else not in active @endif</td>

                <td>
                <form action="{{ route('product_categories.destroy',$product_category->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('product_categories.edit',$product_category->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
    </tr>
            @endforeach
</table>
{!! $product_categories->links() !!}
</body>
</html>
