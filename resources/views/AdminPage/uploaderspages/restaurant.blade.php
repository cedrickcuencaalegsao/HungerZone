@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="form-wrapper">
        <div class="form-title">
            <h1>Register New Restaurant</h1>
        </div>
        <div class="uploader-form">
            <form action="{{ route('up.img.rest') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="output-msg">
                    @if (session('message'))
                        <span>{{ session('message') }}</span><br>
                    @endif
                </div>
                <input type="text" name="name" placeholder="Restaurant Name"><br>
                @if ($errors->has('name'))
                    <span>{{ $errors->first('name') }}</span><br>
                @endif
                <input type="text" name="tagline" placeholder="Tagline"><br>
                @if ($errors->has('tagline'))
                    <span>{{ $errors->first('tagline') }}</span><br>
                @endif
                <input type="file" name="image"><br>
                @if ($errors->has('image'))
                    <span>{{ $errors->first('image') }}</span><br>
                @endif
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="table-view">
        <table>
            <thead>
                <tr>
                    <th>Restaurant ID.</th>
                    <th>Restaurant Name</th>
                    <th>Tagline</th>
                    <th>Date of Registration</th>
                    <th>Date Updated</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach --}}
                @forelse ($data as $rows)
                    <tr>
                        <td>{{ $rows->id }}</td>
                        <td>{{ $rows->restaurantname }}</td>
                        <td>{{ $rows->tagline }}</td>
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ $rows->updated_at }}</td>
                        <td><img src="{{ asset('images/restaurant/' . $rows->image) }}" width="70px" height="70px"
                                alt="image"></td>
                        <td>
                            <a href="{{route('edit.restuarant', ['id' => $rows->id, 'image' => $rows->image])}}" class="Btn-Update"><button>Edit</button></a>
                            <a href="{{ route('del.restaurant', ['id' => $rows->id, 'image' => $rows->image]) }}"
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
