
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{-- <title>Add Company Form - Laravel 8 CRUD</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>

    <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-2 pull-left">
                        <h2>Add category</h2>
                    </div>
                     <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('product_categories.index') }}"> Back</a>
                    </div>
             </div>
            </div>
            @if(session('status'))
                <div class="mt-1 mb-1 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('product_categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                     @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>

            <div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Active</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="active"  value="2" id="inlineRadio2">
            <label class="form-check-label" for="inlineRadio2">Not Active</label>
          </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="ml-3 btn btn-primary">Submit</button>

</form>
</div>
</body>
</html>
