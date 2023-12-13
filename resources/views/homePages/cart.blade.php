@extends('layouts.default_layouts')
@section('content')
    <h1>cart</h1>
    @forelse ($data as $datas)
        <div class="cart-cards">
            <img src="{{ asset('images/menu/' . $datas->image) }}"alt="image"><br>
            <h3>{{ $datas->menu_name }}</h3><br>
            <p>{{ $datas->price }}</p><br>
            <a
                href="{{ route('order.now', ['menu_name' => $datas->menu_name, 'restaurant' => $datas->restaurant_name, 'image' => $datas->image, 'price' => $datas->price]) }}"><button
                    class="ordernow">Order Now</button></a><br>
            <a href="{{ route('remove.from.cart', ['user_id' => encrypt(auth()->user()->id), 'cart_id' => $datas->id]) }}"><button
                    class="removefromcart">Remove
                    From Cart</button></a>
        </div>
    @empty
        <div class="menu-card">
            <h1>no data found.</h1><br>
            <p>Your cart is empty.</p><br>
            <a href="{{ route('view.home') }}"><button class="order-now">Back To Home</button></a>
        </div>
    @endforelse

@stop
