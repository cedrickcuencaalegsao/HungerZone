@extends('layouts.default_layouts')
@section('content')
    <div class="form-wrapper">
        <div class="preview-image">
            <p>preview image</p>
            <img src="{{ asset('images/user/' . $data->image) }}" alt="image" height="100px" width="100px">
        </div>
        <form action="{{ route('update.profile', ['id' => auth()->user()->id, 'image' => auth()->user()->image]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p>update profile</p>
            <p>user ID: {{ $data->id }}</p>
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
            <lable>email:</lable>
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
            <button type="submit">update</button><br>
            <a href="{{ route('cancel.update.profile') }}">Cancel</a>
        </form>
    </div>
@stop
