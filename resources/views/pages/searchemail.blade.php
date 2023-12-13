<style>
    *{
        top: 0;
        left: 0;
        font-family: 'Poppins', sans-serif;
    }
    body{
        background-color: #f44336;
    }
    .container{
        padding: 10px;
        justify-content: center;
        text-align: center;
        position: absolute;
        margin-left: 30%;
        margin-top: 6%;
        background-color: #fff;
        width: 550px;
        height: 58%;
        border: 2px solid #ff6f00;
        border-radius: 10px;
    }
    .form-title {
        color: #f44336;
        text-transform: capitalize;
    }
    .form-title h3{
        font-size: 2em;
        margin-top: 6%;
    }
    .form-title p{
        font-size: 1.5em;
        margin-bottom: 20px;
        margin-top: -10px;
    }
    .messages{
        margin-top: 5px;
        margin-bottom: 10px;
    }
    span{
        color: red;
    }
    input{
        padding: 15px;
        width: 440px;
        margin-left: 15px;
        margin-right: 10px;
        margin-top: -9px;
        color: black;
        border: 2px solid #ff6f00;
        border-radius: 5px;
    }
    label{
        color: #ff6f00;
        position: relative;
        text-transform: uppercase;
        background-color: white;
        border-left: 2px solid #ff6f00;
        border-right: 2px solid #ff6f00;
        padding: 2px;
        letter-spacing: 2px;
        margin-left: -55%;
        margin-right: 20px;
    }
    button{
        margin-top: 15px;
        margin-left: 15px;
        margin-right: 10px;
        margin-bottom: 10px;
        width: 440px;
        border: 2px solid #f44336;
        border-radius: 4px;
        background-color: #f44336;
        padding: 12px;
        color: white;
        text-transform: uppercase;
    }
    button:hover {
        cursor: pointer;
        border: 2px solid #ef5350;
        background-color: #ef5350;
    }
    a{
        font-size: 1em;
        padding: 10px;
    }
</style>
<body>
    <div class="container">
        <div class="form-title">
            <h3>update Password</h3>
            <p>search your email</p>
        </div>
        <div class="messages">
            @if (session('message'))
                <span>{{ session('message') }}</span>
            @endif
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <form action="{{ route('search.email') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="email">Email</label><br>
            <input type="text" name="email"><br>
            <button type="submit">Search</button><br>
            <a href="{{ route('login') }}">Cancel</a>
        </form>
    </div>
</body>
