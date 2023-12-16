@extends('layouts.default_layouts')
@section('content')
    <div class="sec-history">
        <h1>history</h1>
        <table>
            <thead>
                <tr>
                    <th>Order Id.</th>
                    <th>Menu Name</th>
                    <th>Restaurant Name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>total Amount</th>
                    <th>address</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items)
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->menu_name }}</td>
                        <td>{{ $items->restaurant_name }}</td>
                        <td>{{ $items->price }}</td>
                        <td>{{ $items->quantity }}</td>
                        <td>{{ $items->total_amount }}</td>
                        <td>{{ $items->address }}</td>
                        <td><a
                                href="{{ route('delete.history', ['id' => encrypt($items->id), 'user_id' => encrypt(auth()->user()->id)]) }}"><button>Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@stop
