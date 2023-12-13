@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="form-wrapper">
        <div class="form-title">
            <h1>Register new Menu.</h1>
        </div>
        <div class="uploader-form">
            <form action="{{ route('upload.menu') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="output-msg">
                    @if (session('message'))
                        <span>{{ session('message') }}</span>
                    @endif
                </div>
                <input type="text" name="name" placeholder="Menu Name"><br>
                @if ($errors->has('name'))
                    <span>{{ $errors->first('name') }}</span><br>
                @endif
                <label>Select Restaurant:</label><br>
                <select name="restaurantname">
                    @foreach ($restaurantnames as $r_option)
                        <option value="{{ $r_option->restaurantname }}">{{ $r_option->restaurantname }}</option>
                    @endforeach
                </select><br>
                <label>Mark as Best Seller:</label><br>
                <select name="bestseller">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select><br>
                @if ($errors->has('bestseller'))
                    <span>{{ $errors->first('bestseller') }}</span><br>
                @endif
                <input type="text" name="category" placeholder="Category"><br>
                @if ($errors->has('category'))
                    <span>{{ $errors->first('category') }}</span><br>
                @endif
                <input type="number" name="price" placeholder="Price"><br>
                @if ($errors->has('price'))
                    <span>{{ $errors->first('price') }}</span><br>
                @endif
                <label>Select Image:</label>
                <input type="file" name="image" class="file"><br>
                @if ($errors->has('image'))
                    <span>{{ $errors->first('image') }}</span><br>
                @endif
                <button type="submit" class="btn-upload">Upload</button>
            </form>
        </div>
    </div>
    <div class="table-view">
        <table>
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th>bestseller</th>
                    <th>Categories</th>
                    <th>Menu Name</th>
                    <th>price</th>
                    <th>Date of Registration</th>
                    <th>Date updated</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach --}}
                @forelse ($data as $rows)
                    <tr>
                        <td>{{ $rows->restaurantname }}</td>
                        <td>{{ $rows->bestseller }}</td>
                        <td>{{ $rows->categories }}</td>
                        <td>{{ $rows->name }}</td>
                        <td>PHP.{{ $rows->price }}</td>
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ $rows->updated_at }}</td>
                        <td><img src="{{ asset('images/menu/' . $rows->image) }}" width="70px" height="70px"
                                alt="image"></td>
                        <td>
                            <a href="{{ route('edit.menu', ['id' => $rows->id]) }}"
                                class="Btn-Update"><button>Edit</button></a>
                            <a href="{{ route('del.menu', ['id' => $rows->id, 'image' => $rows->image]) }}"
                                class="Btn-Delete"><button>delete</button></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>NaN</td>
                        <td>
                            <a href="#" class="Btn-Update"><button>edit</button></a>
                            <a href="#" class="Btn-Delete"><button>delete</button></a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
