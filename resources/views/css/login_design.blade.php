<style>
    body {
        background-color: #f44336;
    }

    .text_login_design h2 {
        color: #f44336;
        position: relative;
        text-align: center;
        font-size: 2.8em;
        letter-spacing: 5px;
        font-family: cursive;
    }

    .text_login_design span {
        transform: translateX(180px) translateY(-50px);
        font-family: "Poppins", sans-serif;
        position: absolute;
        color: red;
        font-size: 1em;
        margin-left: 13px;
    }

    .text_pagename_design {
        color: white;
        position: absolute;
        font-size: 2em;
        margin-top: 6%;
        margin-left: 10%;
        font-family: cursive;
    }

    .text_pagename_design h1 {
        letter-spacing: 5px;
    }

    .text_pagename_design p {
        margin-top: -55px;
        font-size: 0.7em;
    }

    .slider-frame {
        width: 450px;
        height: 300px;
        position: absolute;
        overflow: hidden;
        margin-top: 20%;
        margin-left: 10%;
        border: 2px solid #f44336;
        border-radius: 10px;
    }

    .image-container img {
        width: 450px;
        height: 300px;
        float: left;
    }

    @-webkit-keyframes slide_animation {
        0% {
            top: 0px;
        }

        10% {
            top: -300px;
        }

        20% {
            top: -600px;
        }

        30% {
            top: -900px;
        }

        40% {
            top: -1200px;
        }

        50% {
            top: 0px;
        }

        60% {
            top: -300px;
        }

        70% {
            top: -300px;
        }

        80% {
            top: -600px;
        }

        90% {
            top: -300px;
        }

        100% {
            top: 0px;
        }
    }

    .slide-images {
        width: 450px;
        height: 300px;
        position: relative;
        -webkit-animation-name: slide_animation;
        -webkit-animation-duration: 20s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-direction: alternate;
        -webkit-animation-play-state: running;
    }

    .form_login {
        position: absolute;
        margin-left: 55%;
        margin-top: 7%;
        background-color: #fff;
        width: 500px;
        height: 515px;
        border: 2px solid #ff6f00;
        border-radius: 10px;
    }

    .login_email {
        margin-top: -50px;
    }

    .login_password {
        margin-top: 10px;
    }

    .form_login input {
        font-family: "Poppins", sans-serif;
        padding: 15px;
        width: 440px;
        margin-left: 15px;
        margin-right: 10px;
        margin-top: 20px;
        color: black;
        border: 2px solid #ff6f00;
        border-radius: 5px;
    }

    .login_email span {
        color: red;
        font-size: 1em;
        margin-left: 13px;
    }

    .login_password span {
        color: red;
        font-size: 1em;
        margin-left: 13px;
    }
    .login-msg{
        margin-left: 10px;
    }
    .form_login label {
        font-family: "Poppins", sans-serif;
        color: #ff6f00;
        position: absolute;
        transform: translateX(30px) translateY(10px);
        text-transform: uppercase;
        background-color: white;
        border-left: 2px solid #ff6f00;
        border-right: 2px solid #ff6f00;
        padding: 2px;
        letter-spacing: 2px;
    }

    .login_btn button {
        margin-top: 15px;
        margin-left: 15px;
        width: 472px;
        border: 2px solid #f44336;
        border-radius: 4px;
        background-color: #f44336;
        padding: 12px;
        color: white;
    }

    .login_btn button:hover {
        cursor: pointer;
        border: 2px solid #ef5350;
        background-color: #ef5350;
    }

    .links_to_Create {
        margin-top: 15px;
        margin-left: 15px;
        margin-right: 15px;
        font-weight: 500;
        font-size: 1em;
        padding: 10px;
    }

    .links_to_forgetPwd {
        transform: translateX(350px) translateY(-27px);
    }

    .text {
        font-size: 0.7em;
        color: #607d8b;
        margin-left: 15px;
        padding: 10px;
    }
</style>
