<div class="mb-2 text-right col-md-16 bg-light">
    <form action="{{ route('logout') }}" method="POST"  class="btn btn-primary">
        @csrf
        <button type="submit">
            {{ __('Logout') }}
        </button>
    </form>

</div>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<body>
<div class ="container mt-3">

    <div class="row">

        <div class="col-sm">

            <a href="{{ url('/vendors') }}" class="btn btn-outline-primary">Vendor</a>
        </div>
        <div class="col-sm">
            <a href="{{ url('/customers') }}" class="btn btn-outline-primary">Customer</a>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/product_categories') }}" class="btn btn-outline-primary">Product Category</a>
        </div>

        <div class="col-sm">
            <a href="{{ url('/products') }}" class="btn btn-outline-primary">Product</a>
        </div>
        <div class="col-sm">
            <a href="{{ url('/sales') }}" class="btn btn-outline-primary">Sales</a>
        </div>

        <div class="col-sm">
            <a href="{{ url('/purchases') }}" class="btn btn-outline-primary">Purchase</a>
        </div>
        <div class="col-sm">
            <a href="{{ route('profitreport') }}" class="btn btn-outline-primary">Report</a>
        </div>
    </div>
</div>

</body>
</head>
</html>

