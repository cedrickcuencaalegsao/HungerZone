@extends('layouts.default_layouts')
@section('content')
    <div class="profile-sec">
        <div class="sec-details">
            <h1>Profile</h1>
            <img src="{{ asset('images/user/' . auth()->user()->image) }}" alt="image">
            <label>User Id: </label><span> {{ auth()->user()->id }}</span><br>
            <label>Firstname: </label><span>{{ auth()->user()->firstname }}</span><br>
            <label>Lastname: </label><span>{{ auth()->user()->lastname }}</span><br>
            <label>Email and contact#: </label><span>{{ auth()->user()->email }}/{{ auth()->user()->phone }}</span><br>
        </div>
        <div class="user-stat">
            <label>Number of orders:</label><span></span><br>
            <label>Number of cart:</label><span></span><br>
            <label>Number of ongoing transaction:</label><span></span><br>
        </div>
        <div class="sec-btn">
            <a href="{{ route('edit.profile', ['id' => encrypt(auth()->user()->id)]) }}"><button
                    class="btnUpdateprofile">Update
                    Profile</button></a><br>
            <a href="#"><button class="btnUpdatepassword">Update Password</button></a><br>
            <a href="{{ route('logout') }}"><button class="btnSignout">Sign Out</button></a>
        </div>
    </div>
@stop
