<style>
    body {
        background-color: #f44336;
    }

    .container {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .title {
        font-family: cursive;
    }

    .title h1,
    h2 {
        text-align: center;
        color: whitesmoke;
    }

    .form-reg {
        font-family: "Poppins", sans-serif;
        background-color: white;
        border: 2px solid #f44336;
        border-radius: 10px;
        height: 600px;
        width: 500px;
    }

    .form-reg input {
        padding: 15px;
        margin-top: 23px;
        width: 89%;
        margin-left: 10px;
        margin-right: 10px;
        border: 2px solid #f57f17;
        border-radius: 5px;
    }

    .form-reg label {
        position: absolute;
        font-weight: 700;
        border-right: 2px solid #f57f17;
        border-left: 2px solid #f57f17;
        background-color: white;
        transform: translateX(20px) translateY(15px);
        letter-spacing: 2px;
        color: #f57f17;
    }

    .create_button button {
        margin-top: 15px;
        margin-left: 15px;
        padding: 12px;
        border: 2px solid #66bb6a;
        border-radius: 8px;
        background-color: #66bb6a;
        font-size: medium;
        color: white;
        letter-spacing: 2px;
        position: relative;
        width: 94%;
        text-transform: uppercase;
        font-weight: 700;
    }

    .create_button button:hover {
        text-transform: uppercase;
        font-weight: 700;
        border: 2px solid green;
        background-color: green;
        cursor: pointer;
    }

    .cancel_button button {
        margin-top: 10px;
        margin-left: 15px;
        font-size: 1em;
        border: 2px solid #f44336;
        border-radius: 8px;
        background-color: #f44336;
        padding: 12px;
        color: white;
        letter-spacing: 2px;
        position: relative;
        text-transform: uppercase;
        font-weight: 700;
        width: 94%;
    }

    .cancel_button button:hover {
        text-transform: uppercase;
        font-weight: 700;
        border: 2px solid red;
        background-color: red;
        cursor: pointer;
    }

    .form-reg span {
        position: absolute;
        color: red;
        font-size: .8em;
        margin-left: 13px;
    }
</style>
