<option value=" ">---select product ---</option>
@foreach ($products as $item )
    <option value="{{ $item->id }}">{{ $item->name }}</option>
@endforeach
