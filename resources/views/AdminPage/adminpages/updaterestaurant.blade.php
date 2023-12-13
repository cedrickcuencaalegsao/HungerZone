@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="update-wrapper">
        <form action="{{ route('updated.restaurant', ['id' => $data->id, 'image' => $data->image]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="output-msg">
                @if (session('message'))
                    <span>{{ session('message') }}</span>
                @endif
            </div>
            <p>update restuarant details</p>
            <p>Restaurant Id: {{ $data->id }}</p>
            <label>Restaurant Name:</label><br>
            <input type="text" name="name" value="{{ $data->restaurantname }}"><br>
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span><br>
            @endif
            <input type="text" name="tagline" value="{{ $data->tagline }}"><br>
            @if ($errors->has('tagline'))
                <span>{{ $errors->first('tagline') }}</span><br>
            @endif
            <input type="file" name="image"><br>
            <p>image preview</p><img src="{{ asset('images/restaurant/' . $data->image) }}" alt="image"><br>
            <button type="submit">Update</button>
            <a href="{{ route('uploader.restaurant') }}">Cancel</a>
        </form>
    </div>
@stop
