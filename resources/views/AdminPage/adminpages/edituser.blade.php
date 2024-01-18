@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="edit-user">
        <h1>asdf</h1>
        <p>{{ $data }}</p>
        <label for="firstname">First Name: </label><span>{{ $data->firstname }}</span><br>
        <label for="lastname">Last Name: </label><span>{{ $data->lastname }}</span><br>
        <label for="email">Email: </label><span>{{ $data->email }}</span><br>
        <label for="phone">phone: </label><span>{{ $data->email }}</span><br>
        <label for="image">image:</label><br>
        <img src="{{ asset('images/user/' . $data->image) }}" alt="image" height="300px" width="250px">
        <br>
        <label for="isadmin">User type:</label>
        <span>
            @if ($data->isAdmin == 1)
                Administrator
            @else
                Client
            @endif
        </span><br>
        <form action="{{route('update.user', ['id' => encrypt($data->id)])}}" method="POST">
            @csrf
            @method('PUT')
            <label for="usertype">Change User Type:</label>
            <select name="usertype">
                <option>Client</option>
                <option>Admin</option>
            </select><br>
            <button>Update</button>
        </form>

    </div>
@stop
