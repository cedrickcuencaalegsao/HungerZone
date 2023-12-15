@extends('layouts.default_layouts')
@section('content')
    <div class="delivery">
        @foreach ($data as $items)
            <div class="delivery-cards">
                <div class="details">
                    <label>Order Id: </label><span>{{ $items->id }}</span><br>
                    <label>Restaurant Name: </label><span>{{ $items->restaurant_name }}</span><br>
                    <label>Menu Name: </label><span>{{ $items->menu_name }}</span><br>

                    <label>PHP: </label><span>{{ $items->price }}</span><br>
                    <label>Qantity: </label><span>{{ $items->quantity }}</span><br>
                    <label>total amount: </label><span>{{ $items->total_amount }}</span><br>
                    @if ($items->status == 0)
                        <label class="status">Delivering to: </label>
                        <span>{{ $items->address }}</span><br>
                    @else
                        <label class="status">Delivered to: </label>
                        <span>{{ $items->address }}</span><br>
                    @endif
                    <a href="{{ route('cancel.delivery', ['id' => $items->id]) }}"><button
                            class="btn-cancel">Cancel this delivery</button></a>
                </div>
                <img src="{{ asset('images/menu/' . $items->image) }}"alt="image"><br>
            </div>
        @endforeach
    </div>
@stop
