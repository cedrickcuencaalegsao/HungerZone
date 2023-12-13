@extends('layouts.default_layouts')
@section('content')
    @foreach ($rest_img as $imgs)
        <div class="restaurant-card">
            <img src="{{ asset('images/restaurant/' . $imgs->image) }}"alt="image"><br>
            <h3>{{ $imgs->restaurantname }}</h3><br>
            <p>"{{ $imgs->tagline }}"</p><br>
            <a
                href="{{ route('view.menu', ['category' => 'null', 'restaurant' => $imgs->restaurantname, 'bestseller' => 'Yes']) }}"><button>open
                    menu</button>
            </a>
        </div>
    @endforeach
@stop
