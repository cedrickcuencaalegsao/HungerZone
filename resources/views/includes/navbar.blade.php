<header>
    <h3>HunGerZone</h3>
    <nav>
        <a href="{{ route('view.home') }}">Home</a>
        <a href="{{ route('view.cart', ['user_id' => encrypt(auth()->user()->id)]) }}">MyCart</a>
        <a href="{{ route('view.delivery', ['user_id' => encrypt(auth()->user()->id)]) }}">Delivery</a>
        <a href="{{ route('view.history') }}" class="last">History</a>
        <a href="{{ route('view.profile') }}" class="username">
            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
            <img src="{{ asset('images/user/' . auth()->user()->image) }}" alt="image">
        </a>
    </nav>
</header>
