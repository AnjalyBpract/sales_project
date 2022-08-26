<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <div class="mb-2 pull-left">
                    <h2>Add Vendor</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="mt-1 mb-1 alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder=" Name">
                        {{-- @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif --}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        <input type="text" name="address" class="form-control" placeholder=" Address">
                        @error('address')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="email" name="email" class="form-control" placeholder=" Email">
                        @error('email')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password </strong>
                            <input type="pasword" name="password" class="form-control" placeholder=" Password">
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
