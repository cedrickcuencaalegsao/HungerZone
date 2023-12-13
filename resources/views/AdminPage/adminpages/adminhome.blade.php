@extends('AdminPage.adminlayout.adminlayout')
@section('content')
    <div class="admin-dashboard">
        <div class="card">
            <h1>Restaurant</h1>
            <span >numbers of registered restaurants</span>
            <p>{{$count_restaurant}}</p>
            <a href="{{ route('uploader.restaurant') }}"><button>Open Card</button></a>

        </div>
        <div class="card">
            <h1>Menus</h1>
            <span>numbers of registered menus</span>
            <p>{{$count_menu}}</p>
            <a href="{{ route('uploader.menu') }}"><button>Open Card</button></a>

        </div>
        <div class="card">
            <h1>Users</h1>
            <span>numbers of registered users</span>
            <p>{{$count_user}}</p>
            <a href="{{ route('view.user')}}"><button>Open Card</button></a>
        </div>
    </div>
@stop
