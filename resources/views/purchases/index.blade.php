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
                    <h2>Purchase Registration</h2>
                    </div>
                    <div class="mb-2 pull-right">
                    <a class="btn btn-success" href="{{ route('purchases.create') }}"> Create Purchase</a>
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
        {{-- <th>Date</th> --}}
        <th>Product Category</th>
        <th>Product</th>
        <th>Transaction Type</th>
        <th>User</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>

        <th width="280px">Action</th>
    </tr>
            @foreach ($purchases as $purchase)
           {{-- {{ dd( $sale)}} --}}
                <tr>
                {{-- <td>{{ $sale->id }}</td> --}}
                <td>{{ $purchase->id}}</td>
                <td>{{ $purchase->product_category_id }}</td>
                <td>{{ $purchase->product_id }}</td>
                <td>{{ $purchase->type }}</td>
                <td>{{ $purchase->user_id }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->rate }}</td>
                <td>{{ $purchase->total_amount }}</td>
                {{-- <td>@if($user->active == 1)active @else not in active @endif</td> --}}

                <td>
                <form action="{{ route('purchases.destroy',$purchase->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('purchases.edit',$purchase->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
    </tr>
            @endforeach
</table>
{!! $purchases->links() !!}
</body>
</html>
