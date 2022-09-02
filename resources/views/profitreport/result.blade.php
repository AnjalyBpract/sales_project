<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
{{-- <title>Add Company Form - Laravel 8 CRUD</title> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="mb-2 pull-left">
                    <center><h1>Report</h1></center>
                </div>
                 <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('profitreport') }}"> Back</a>
                </div>
         </div>
        </div>

    <h5><br>SalesAmount : ${{ $salesAmount }}</h5>
    <h5><br>PurchaseAmount : ${{ $purchaseAmount }}</h5>
    @if($message == "loss")
  <h4><p class="text-danger">Result:{{$message}}:{{abs($result)}}</p></h4>
   @else <h4><p class="text-primary">Result:{{$message}}:{{abs($result)}} </p></h4>@endif

</div>
</body>
</html>
