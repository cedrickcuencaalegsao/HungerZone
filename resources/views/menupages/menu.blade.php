@extends('layouts.default_layouts')

@section('sidebar')
    <div class="side-bar-menu">
        @foreach ($menu as $menus)
            <a href="{{ route('view.menu', ['category' => $menus, 'restaurant' => $restaurant, 'bestseller' => 'Yes']) }}">{{ $menus }}
            </a><br>
        @endforeach
    </div>
@stop
@section('content')
    @forelse ($restaurant_menu as $menu)
        <div class="menu-card">
            <img src="{{ asset('images/menu/' . $menu->image) }}" width="310px" height="230px" alt="image"><br>
            <h3>{{ $menu->name }}</h3><br>
            <p>PHP: {{ $menu->price }}</p><br>
            <a
                href="{{ route('order.now', ['menu_name' => $menu->name, 'restaurant' => $restaurant, 'image' => $menu->image, 'price' => $menu->price]) }}"><button
                    class="order-now">order now</button></a>
            <a
                href="{{ route('Add.ToCart', ['user_id' => encrypt(auth()->user()->id), 'image' => $menu->image, 'menu_name' => $menu->name, 'restaurant' => $restaurant, 'price' => $menu->price]) }}"><button
                    class="add-to-cart">add to cart</button></a>
        </div>
    @empty
        <div class="menu-card">
            <h1>no data found.</h1><br>
            <p>This is commonly happening due to the restaurant have not yet wuploaded
                any menu or the restaurant menu have been deleted.</p><br>
            <a href="{{ route('view.home') }}"><button class="order-now">Back To Home</button></a>
        </div>
    @endforelse
@stop
