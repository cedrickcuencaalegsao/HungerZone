<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HungerZone-Login</title>
</head>
@include('css.register_design')
<body>
    <div class="container">
        <div class="title">
            <h1>HunGerZone</h1>
            <h2>Create Account</h2>
            <div class="form-reg">
                <div class="register_firstname">
                    <form action="{{ route('registercheck') }}" method="POST">
                        @csrf
                        <label>First Name</label>
                        <input type="firstname" name="FirstName"><br>
                        @if ($errors->has('FirstName'))
                            <span>{{ $errors->first('FirstName') }}</span><br>
                        @endif
                        <label>Last Name</label>
                        <input type="lastname" name="LastName"><br>
                        @if ($errors->has('LastName'))
                            <span>{{ $errors->first('LastName') }}</span><br>
                        @endif
                        <label>Email</label>
                        <input type="email" name="Email"><br>
                        @if ($errors->has('Email'))
                            <span>{{ $errors->first('Email') }}</span><br>
                        @endif
                        <label>Phone Number</label>
                        <input type="number" name="PhoneNumber"><br>
                        @if ($errors->has('PhoneNumber'))
                            <span>{{ $errors->first('PhoneNumber') }}</span><br>
                        @endif
                        <label>Password</label>
                        <input type="password" name="Password"><br>
                        @if ($errors->has('Password'))
                            <span>{{ $errors->first('Password') }}</span><br>
                        @endif
                        <label>Confirm Password</label>
                        <input type="password" name="ConfirmPassword"><br>
                        @if ($errors->has('ConfirmPassword'))
                            <span>{{ $errors->first('ConfirmPassword') }}</span><br>
                        @endif
                        <div class="create_button">
                            <button type="submit">Create</button>
                        </div>
                    </form>
                    <form action="{{ route('cencelregister') }}">
                        <div class="cancel_button">
                            <button type="submit">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
