
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
                        <h2>Add Sales</h2>
                    </div>
                     <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
                    </div>
             </div>
            </div>
            @if(session('status'))
                <div class="mt-1 mb-1 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                        <input type="date" name="date" class="form-control" >
                        @error('date')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                     @enderror
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong> Transation Type</strong>
            <select class="form-control" aria-label="Default select example" name="transaction_type">
                <option selected>select type</option>
                <option value="1">Sale </option>
                <option value="2">Purchase</option>
              </select>
            </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>User Type</strong>
        <select class="form-control" aria-label="Default select example" name="user_id"  id="user-dropdown">
            @foreach($data as $item)
                <option value= "{{$item->id}}" >{{$item->name}}</option>
            @endforeach
          </select>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Product Category</strong>
                      <label for="product_category_id"></label>
                      <select name="product_category_id" id="product_category-dropdown" class="form-control"></select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong>Product Name:</strong>
                          <label for="product_id"></label>
                          <select name="product_id" id="product-dropdown" class="form-control"></select>
                        </div>
                      </div>
{{--
                     <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong>Rate</strong>
                          <label for="product_id"></label>
                          <select name="product_id" id="rate-dropdown" class="form-control"></select>
                        </div>
                      </div>

 --}}

    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Quantity</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                @error('quantity')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
             @enderror
    </div>
</div> --}}
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Amount</strong>
            <input type="text" name="rate" class="form-control" placeholder="Amount">
            @error('amount')
            <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
         @enderror
</div>
</div>

    <div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="ml-3 btn btn-primary">Submit</button>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#user-dropdown').on('change', function () {
            var idUser = this.value;
            $("#product_category-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-product_categories')}}",
                type: "POST",
                data: {
                    user_id: idUser,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#product_category-dropdown').html('<option value="">-- Select product_category --</option>');
                    $.each(result.product_categories, function (key, value) {
                        $("#product_category-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#product-dropdown').html('<option value="">-- Select product --</option>');
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#product_category-dropdown').on('change', function () {
            var idState = this.value;
            $("#product-dropdown").html('');
            $.ajax({
                url: "{{url('api/fetch-products')}}",
                type: "POST",
                data: {
                    product_id: idProduct,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#product-dropdown').html('<option value="">-- Select product --</option>');
                    $.each(res.products, function (key, value) {
                        $("#product-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>



</div>
</body>
</html>
