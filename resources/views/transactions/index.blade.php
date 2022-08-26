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
                    <h2>User Registration</h2>
                    </div>
                    <div class="mb-2 pull-right">
                    <a class="btn btn-success" href="{{ route('transactions.create') }}"> Create Transactions</a>
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
        <th>Date</th>
        <th>Product Category</th>
        <th>Product</th>
        <th>Transaction Type</th>
        <th>User</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>

        <th width="280px">Action</th>
    </tr>
            @foreach ($transactions as $transaction)
                <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->date }}</td>
                <td>{{ $transaction->product_category_id }}</td>
                <td>{{ $transaction->product_id }}</td>
                <td>{{ $transaction->trasation_type }}</td>
                <td>{{ $transaction->user_id }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->rate }}</td>
                <td>{{ $transaction->amount }}</td>
                {{-- <td>@if($user->active == 1)active @else not in active @endif</td> --}}

                <td>
                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
    </tr>
            @endforeach
</table>
{!! $transactions->links() !!}
</body>
</html>
