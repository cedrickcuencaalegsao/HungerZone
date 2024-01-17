<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HungerZone-Login</title>
</head>
@include('css.login_design')

<body>
    <div class="container">
        <div class="images-ani">
            <div class="text_pagename_design">
                <h1>HunGerZone</h1>
                <p>A place for Food and Pleasures.</p>
            </div>
            <div class="slider-frame">
                <div class="slide-images">
                    <div class="image-container">
                        @foreach ($login_imgs as $img)
                            <img src="{{ asset('images/loginimg/' . $img->image) }}" alt="image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="form-sec">
            <form action="{{ route('logincheck') }}" method="POST">
                @csrf
                <div class="form_login">
                    <div class="text_login_design">
                        <h2>LOGIN</h2><br>
                        @if (session('message'))
                            <span class="login-mgs">{{ session('message') }}</span>
                        @endif
                    </div>
                    <div class="login_email">
                        <label>Email</label>
                        <input type="email" name="email"><br>
                        @if ($errors->has('email'))
                            <span>{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="login_password">
                        <label>Password</label>
                        <input type="password" name="password"><br>
                        @if ($errors->has('password'))
                            <span>{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="login_btn">
                        <button type="submit">LOG IN</button>
                    </div>
                    <div class="links_to_Create">
                        <a href="{{ route('register') }}">Register new account</a>
                    </div>
                    <div class="links_to_forgetPwd">
                        <a href="{{ route('view.search.email') }}">Forget Password</a>
                    </div>
                    <div class="text">
                        <p>The HunGerZone Project was created by Cedrick C. Alegsao and</p>
                        <p>Joshua Mark H. Playda</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
