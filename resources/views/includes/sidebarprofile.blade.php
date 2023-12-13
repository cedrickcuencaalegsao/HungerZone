<div class="sidebar-profile">
    <div class="side-bar-profile-pic">
        <img src="{{ asset('images/user/' . auth()->user()->image) }}" alt="image">
    </div>
    <p class="indicator">user id:</p>
    <p class="userid">{{ auth()->user()->id }}</p>
    <p class="indicator">Name:</p>
    <p class="name">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</p>
    <p class="indicator">Email:</p>
    <p class="email">{{ auth()->user()->email }}</p>
    <p class="indicator">Cell #.</p>
    <p class="phone">{{ auth()->user()->phone }}</p>
    {{-- <a href="{{ route('logout') }}" color: black;><button>Sign Out</button></a> --}}
</div>
