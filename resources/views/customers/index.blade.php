<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <title>Laravel 9 CRUD Tutorial Example</title> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customer Registration</h2>
                </div>
                <div class="mb-2 pull-right">
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Create Vendor</a>

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
            <thead>
                <tr>
                    <th>S.No</th>
                    <th> Name</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                         {{-- <td>{{ $user->email }}</td> --}}
                        {{-- <td>{{ $user->password }}</td> --}}
                       {{-- <td>{{ $user->type }}</td>  --}}
                        <td>@if($customer->active == 1)active @else not in active @endif</td>
                        <td>
                            <form action="{{ route('customers.destroy',$customer->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $customers->links() !!}
    </div>
</body>
</html>
