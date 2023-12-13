@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="form-wrapper">
        <div class="form-title">
            <h1>Upload image for login page.</h1>
        </div>
        <div class="uploader-form">
            <form action="{{ route('up.login.img') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Image Name"><br>
                @if ($errors->has('name'))
                    <span>{{ $errors->first('name') }}</span><br>
                @endif
                <label for="imagefile">Select Image:</label><br>
                <input type="file" name="image" id="imagefile" class="file"><br>
                @if ($errors->has('image'))
                    <span>{{ $errors->first('image') }}</span><br>
                @endif
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
    <div class="table-view">
        <table>
            <thead>
                <tr>
                    <th>Restaurant ID.</th>
                    <th>Restaurant Name</th>
                    <th>Date of Registration</th>
                    <th>Updated Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach --}}
                @forelse ($data as $rows)
                    <tr>
                        <td>{{ $rows->id }}</td>
                        <td>{{ $rows->name }}</td>
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ $rows->updated_at }}</td>
                        <td><img src="{{ asset('images/loginimg/' . $rows->image) }}" width="70px" height="70px"
                                alt="image"></td>
                        <td>
                            <a href="{{ route('edit.login.img', ['id' => $rows->id]) }}"
                                class="Btn-Update"><button>Edit</button></a>
                            <a href="{{ route('del.login.img', ['id' => $rows->id, 'image' => $rows->image]) }}"
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
                        <td>
                            <a href="#" class="Btn-Update"><button>update</button></a>
                            <a href="#" class="Btn-Delete"><button>delete</button></a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
