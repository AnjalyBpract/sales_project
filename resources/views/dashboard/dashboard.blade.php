


<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">
        {{ __('Logout') }}
    </button>
</form>

{{-- <div class ="container">
    <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-2">
            <a href="{{ route('user') }}" calss="btn btn-outline-primary">Vendor/ Customer</a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('product_categories') }}" calss="btn btn-outline-primary">Product Category</a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('products') }}" calss="btn btn-outline-primary">Product</a>
        </div>












    </div>
</div> --}}
