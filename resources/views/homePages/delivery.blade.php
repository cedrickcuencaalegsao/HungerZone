@extends('layouts.default_layouts')
@section('content')
    @foreach ($data as $items)
        <div class="delivery-cards">
            <img src="{{ asset('images/menu/' . $items->image) }}"alt="image"><br>
            <p>{{ $items->id }}</p>
            <h3>{{ $items->menu_name }}</h3>
            <p>PHP: {{ $items->price }}</p>
            <p>Qantity: {{ $items->quantity }}</p>
            @if ($items->status == 0)
                <span class="status">Delivering to: </span>
                <p>{{ $items->address }}</p><br>
            @else
                <span class="status">Delivered to: </span>
                <p>{{ $items->address }}</p><br>
            @endif
            <a href="{{ route('cancel.delivery', ['id' => $items->id]) }}"><button>Cancel</button></a>
        </div>
    @endforeach
@stop
