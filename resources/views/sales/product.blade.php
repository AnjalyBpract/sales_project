@foreach ($products as item )
    <option value="{{ $item->id }}">{{ $item->product }}</option>
@endforeach
