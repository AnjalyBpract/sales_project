<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
{{-- <title>Edit Company Form - Laravel 8 CRUD Tutorial</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
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
            <div class="pull-left">
                <h2>Edit Sale</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sales.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
        @if(session('status'))
            <div class="mt-1 mb-1 alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <form action="{{ route('sales.update',$sale->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        {{-- <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                        <input type="date" name="date" class="form-control" >
                        @error('date')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                     @enderror
            </div>
        </div> --}}
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type</strong>
                    <input type="text" name="type" value="{{ $sale->type }}" class="form-control" >
                @error('type')
                    <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> --}}

    <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>Type</strong>
        <select class="form-control" aria-label="Default select example" name="user_id"  id="user_id">
            @foreach($data as $item)
            <option value= "{{ $item->id }}"{{($item->id == $sale->user_id) ? 'selected' :'' }} >{{$item->name}}</option>
        @endforeach
      </select>
          </select>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Product Category</strong>
                      <label for="product_category_id"></label>
                      <select name="product_category_id" id="product_category_id" class="form-control">
                        @foreach($datass as $item)
                        <option value= "{{ $item->id }}"{{($item->id == $sale->product_category_id) ? 'selected' :'' }} >{{$item->name}}</option>
                    @endforeach
                </select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                      <strong>Product Name:</strong>
                          <label for="product_id"></label>
                            <select name="product_id" id="product_category_id" class="form-control">
                                @foreach($datas as $item)
                                <option value= "{{ $item->id }}"{{($item->id == $sale->product_id) ? 'selected' :'' }} >{{$item->name}}</option>
                            @endforeach
                            </select>
                            </div>
                      </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Quantity</strong>
                <input type="text" name="quantity" value="{{ $sale->quantity }}" class="form-control" id="quantity_id" >
            @error('quantity')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rate</strong>
                <input type="text" name="rate" value="{{ $sale->rate }}" class="form-control" id="rate_id" >
            @error('rate')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Total Amount</strong>
                <input type="text" name="total_amount" value="{{ $sale->total_amount }}" class="form-control" id="total_amount">
            @error('total_amount')
                <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="ml-3 btn btn-primary">Submit</button>

            </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


<script type="text/javascript">

$(document).ready(function ($) {
$("#product_category_id").click(function(e) {
    // console.log(1);

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
e.preventDefault();

var product_category_id =  $(this).val();
$.ajax({
url:"{{ route('get_product') }}",
dataType:'html',
type:"POST",
data: { product_category: product_category_id},

success:function (data) {
//   console.log(data);
    $("#product_id").html(data);

},
error:function (data) {
    $("#product_id").html('There was an error please contact administrator');

},
})
});
});
</script>



<script type="text/javascript">

$(document).ready(function ($) {
$("#product_id").click(function(e) {

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
e.preventDefault();

var product_id =  $(this).val();
$.ajax({
url:"{{ route('get_rate') }}",
dataType:'json',
type:"POST",
data: { product_id: product_id},
success: function(res) {
    console.log(res);
    var x = res;
  $("#rate_id").val(x);


}

})
});
});
$("#quantity_id").keyup(function(){
    var qty= $(this).val();
    console.log(1);
    if(qty){

    var rate=$("#rate_id").val();
    var amt= qty*rate;
    $("#total_amount").val(amt);
  }
  });

</script>
</div>
</body>
</html>
