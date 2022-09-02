<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
{{-- <title>Add Company Form - Laravel 8 CRUD</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<div class="container">
    <center><h1>Report</h1></center>
    <h5><br>SalesAmount : ${{ $salesAmount }}</h5>
    <h5><br>PurchaseAmount : ${{ $purchaseAmount }}</h5>
    @if($message == "loss")
  <h4><p class="text-danger">Result:{{$message}}:{{$result}}</p></h4>
   @else <h4><p class="text-primary">Result:{{$message}}:{{$result}} </p></h4>@endif

</div>
</body>
</html>
