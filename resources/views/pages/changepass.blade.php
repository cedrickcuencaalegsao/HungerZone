<style>
    * {
        top: 0;
        left: 0;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-color: #f44336;
    }
    .change-pass {
        padding: 10px;
        justify-content: center;
        text-align: center;
        position: absolute;
        margin-left: 30%;
        margin-top: 3%;
        margin-bottom: 10%;
        background-color: #fff;
        width: 550px;
        height: 83%;
        border: 2px solid #ff6f00;
        border-radius: 10px;

    }
    .title {
        color: #f44336;
        text-transform: capitalize;
    }

    .title h3 {
        text-align: center;
        font-size: 2em;
        margin-top: 6%;
    }
    .title p {
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
    input {
        padding: 15px;
        width: 440px;
        margin-left: 15px;
        margin-right: 10px;
        margin-top: -9px;
        margin-bottom: 10px;
        color: black;
        border: 2px solid #ff6f00;
        border-radius: 5px;
    }
    .email label {
        color: #ff6f00;
        position: relative;
        text-transform: uppercase;
        background-color: white;
        border-left: 2px solid #ff6f00;
        border-right: 2px solid #ff6f00;
        padding: 2px;
        letter-spacing: 2px;
        margin-left: -58%;
        margin-right: 20px;
    }
    .newpassword label{
        color: #ff6f00;
        position: relative;
        text-transform: uppercase;
        background-color: white;
        border-left: 2px solid #ff6f00;
        border-right: 2px solid #ff6f00;
        padding: 2px;
        letter-spacing: 2px;
        margin-left: -40%;
        margin-right: 20px;
    }
    .confirmpassword label{
        color: #ff6f00;
        position: relative;
        text-transform: uppercase;
        background-color: white;
        border-left: 2px solid #ff6f00;
        border-right: 2px solid #ff6f00;
        padding: 2px;
        letter-spacing: 2px;
        margin-left: -32%;
        margin-right: 20px;
    }
    button {
        margin-top: 10px;
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

    a {
        font-size: 1em;
        padding: 10px;
        text-transform: capitalize;
    }
</style>

<body>
    <div class="change-pass">
        <div class="title">
            <h3>update password</h3>
            <p>type new password</p>
        </div>
        <div class="messages">
            @if (session('message'))
                <span>{{ session('message') }}</span><br>
            @endif
            @if ($errors->has('newpassword'))
                <span>{{ $errors->first('newpassword') }}</span><br>
            @endif
            @if ($errors->has('confirmpass'))
                <span>{{ $errors->first('confirmpass') }}</span><br>
            @endif
        </div>
        <form action="{{ route('change.password', ['id' => encrypt($data->id)]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="email">
                <label for="email">email</label><br>
                <input type="text" name="email" id="email" value="{{ $data->email }}"><br>
            </div>
            <div class="newpassword">
                <label for="newpassword">new password</label><br>
                <input type="password" name="newpassword"><br>
            </div>
            <div class="confirmpassword">
                <label for="confirmpass">confirm password</label><br>
                <input type="password" name="confirmpass"><br>
            </div>
            <button type="submit">Change</button><br>
            <a href="{{ route('view.search.email') }}">back</a>
        </form>
    </div>
</body>
