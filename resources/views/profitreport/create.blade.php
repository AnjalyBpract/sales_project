<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{-- <title>Add Company Form - Laravel 8 CRUD</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>

    <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-2 pull-left">
                        <h2>Add Profit/Loss</h2>
                    </div>
                     <div class="pull-right">
                        <div class="mb-2 text-right col-md-10 bg-light">
                            <a class="btn btn-primary" href="{{ url('/dashboard') }}"> dashbord</a>
                    </div>
             </div>
            </div>
            @if(session('status'))
                <div class="mt-1 mb-1 alert alert-success">
                    {{ session('status') }}
                </div>

            @endif
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('report') }}" method="GET" >
        <div class="container">
        <div class="row">
            <div class="form-group col-md-6">
                <strong>Start Date</strong>
            <input type="date" class="form-control" id="startDate" name="startDate" >
            </div>
            <div class="form-group col-md-6">
                <strong>End Date</strong>
            <input type="date" class="form-control" id="endDate" name="endDate">
            </div>


            <div class="form-group col-md-6">
            <strong>Product Category:</strong>
            <label for="productcategory_id"></label>
            <select name="product_category_id" id="product_category_id" class="form-control">
                <option value=" ">---select product category---</option>
                @foreach($data as $item)
                <option value= "{{$item->id}}" >{{$item->name}}</option>
                 @endforeach

            </select>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <strong>Product Name:</strong>

                <label for="product_id"></label>
                <select name="product_id" id="product_id" class="form-control">
                    <option value=" ">---select product---</option>
            </select>
            </div>
        </div>
        <button type="submit" class="ml-3 btn btn-primary">Submit</button>
    </form>

</body>
</html>
<script type="text/javascript">
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
