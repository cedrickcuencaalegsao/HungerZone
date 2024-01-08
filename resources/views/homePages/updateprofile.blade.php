@extends('layouts.default_layouts')
@section('content')
    <div class="sec-update-profile">
        <form action="{{ route('update.profile', ['id' => auth()->user()->id, 'image' => auth()->user()->image]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>update profile</h1>
            <label>user ID: {{ $data->id }}</label><br>
            <label>first name:</label>
            <input type="text" name="firstname" value="{{ $data->firstname }}"><br>
            @if ($errors->has('firstname'))
                <span>{{ $errors->first('firstname') }}</span><br>
            @endif
            <label>last name:</label>
            <input type="text" name="lastname" value="{{ $data->lastname }}"><br>
            @if ($errors->has('lastname'))
                <span>{{ $errors->first('lastname') }}</span><br>
            @endif
            <label>email:</label>
            <input type="text" name="email" value="{{ $data->email }}"><br>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span><br>
            @endif
            <label for="">phone:</label>
            <input type="number" name="phone" value="{{ $data->phone }}"><br>
            @if ($errors->has('phone'))
                <span>{{ $errors->first('phone') }}</span><br>
            @endif
            <label>uploaded profile picture:</label><br>
            <input type="file" name="image"><br>
            @if ($errors->has('image'))
                <span>{{ $errors->first('image') }}</span><br>
            @endif
            <button type="submit" class="btn-update">update</button><br>

        </form>
        <a href="{{ route('cancel.update.profile') }}"><button class="btn-cancel-update">Cancel</button></a>
    </div>
@stop
