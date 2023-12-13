@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="update-wrapper">
        <form action="{{ route('update.menu', ['id' => $data->id, 'image' => $data->image]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>ID:</label>
            <p name="id">{{ $data->id }}</p>
            <label>menu name:</label><br>
            <input type="text" name="menuname" value="{{ $data->name }}"><br>
            @if ($errors->has('menuname'))
                <span>{{ $errors->first('menuname') }}</span><br>
            @endif
            <label>select restaurant:</label><br>
            <select name="restaurantname">
                <option value=""></option>
                @foreach ($restaurant as $restaurant)
                    <option value="{{ $restaurant->restaurantname }}">{{ $restaurant->restaurantname }}</option>
                @endforeach
            </select><br>
            @if ($errors->has('restaurantname'))
                <span>{{ $errors->first('restaurantname') }}</span><br>
            @endif
            <label>mark as bestseller:</label><br>
            <select name="bestseller">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br>
            <label>Category</label><br>
            <input type="text" name="category" value="{{ $data->categories }}"><br>
            @if ($errors->has('category'))
                <span>{{ $errors->first('category') }}</span><br>
            @endif
            <label>price</label>
            <input type="text" name="price" value="{{ $data->price }}"><br>
            @if ($errors->has('price'))
                <span>{{ $errors->first('price') }}</span><br>
            @endif
            <label>select image:</label><br>
            <input type="file" name="image" value="{{ $data->image}}"><br>
            <p>image preview</p>
            <img src="{{ asset('images/menu/' . $data->image) }}" alt="image"><br>
            <button type="submit">Update</button>
            <a href="{{ route('uploader.menu') }}">Cancel</a>
        </form>
    </div>
@stop
