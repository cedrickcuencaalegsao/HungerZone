@extends('layouts.default_layouts')
@section('content')
    <div class="order-content">
        <form action="{{ route('ordered', ['user_id' => auth()->user()->id, 'image' => $data->image]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="messages">
                @if ($errors->has('menuid'))
                    <span>{{ $errors->first('menuid') }}</span><br>
                @endif
                @if ($errors->has('orderdate'))
                    <span>{{ $errors->first('orderdate') }}</span><br>
                @endif
                @if ($errors->has('fname'))
                    <span>{{ $errors->first('fname') }}</span><br>
                @endif
                @if ($errors->has('lname'))
                    <span>{{ $errors->first('lname') }}</span><br>
                @endif
                @if ($errors->has('price'))
                    <span>{{ $errors->first('price') }}</span><br>
                @endif
                @if ($errors->has('quantity'))
                    <span>{{ $errors->first('quantity') }}</span><br>
                @endif
                @if ($errors->has('mName'))
                    <span>{{ $errors->first('mName') }}</span><br>
                @endif
                @if ($errors->has('address'))
                    <span>{{ $errors->first('address') }}</span><br>
                @endif
            </div>
            <label>Menu Id: </label><input type="text" name="menuid" value="{{ $data->id }}"><br>
            <label>Order Date: </label><input type="text" name="orderdate" value="{{ $date }}"><br>
            <label>Purchase By: </label><input type="text" name="fname" value="{{ auth()->user()->firstname }} ">
            <input type="text" name="lname" value="{{ auth()->user()->lastname }}"><br>
            <label>Contact Number: </label><input type="text" name="phone" value="{{ auth()->user()->phone }}"><br>
            <label>Restaurant Name: </label><input type="text" name="rname" value="{{ $data->restaurantname }}"><br>
            <label>Menu Name: </label><input type="text" name="mName" value="{{ $data->name }}"><br>
            <label>Price: </label><input type="text" name="price" value="{{ $data->price }}"><br>
            <label>Quatity: </label><input type="number" name="quantity"><br>
            <label>Address: </label><input type="text" name="address"><br>
            <label>Total Amount:</label><span>asdf</span><br>
            <label>Order Payment:</label>
            <select name="payment" id="payment">
                <option value="BDO">BDO</option>
                <option value="GCash">GCash</option>
                <option value="VISA">VISA</option>
                <option value="Paypal">Paypal</option>
                <option value="cash">cash on delivery</option>
            </select><br>
            <button type="submit">ORDER NOW</button><br>
            <img src="{{ asset('images/menu/' . $data->image) }}" alt="image"><br>
        </form>
    </div>
@stop
