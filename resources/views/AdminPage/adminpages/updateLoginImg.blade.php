@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="update-wrapper">
        <form action="{{ route('update.login.img', ['id' => $data->id, 'image' => $data->image]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <p>update login images.</p>
            <p>Login Image ID: {{ $data->id }}</p>
            <label>Restaurant Name:</label><br>
            <input type="text" name="restaurantname" value="{{ $data->name }}"><br>
            @if ($errors->has('restaurantname'))
                <span>{{ $errors->first('restaurantname') }}</span><br>
            @endif
            <label>New Image:</label><br>
            <input type="file" name="image">
            <p>preview image</p><br>
            <img src="{{ asset('images/loginimg/' . $data->image) }}" height="250px" width="300px" alt=""><br>
            <button type="submit">Update</button>
            <a href="{{ route('uploader.login.images') }}">Cancel</a>
        </form>
    </div>
@stop
