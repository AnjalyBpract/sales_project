<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">
        {{ __('Logout') }}
    </button>
</form>

{{-- <a href ="{{ route('user') }}"><button type ="submit"></a> --}}
