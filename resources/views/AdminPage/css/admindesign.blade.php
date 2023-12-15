<style>
    body {
        margin: 0;
        padding: 0;
    }
    .navigation-bar header{
        height: 70px;
        margin-right: 50px;
        position: fixed;
        width: 100%;
        background-color: #f44336;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }
    .navigation-bar a{
        margin-left: 10px;
        font-size: 20px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-family: "Arial", sans-serif;

    }
    .navigation-bar a:hover {
        text-decoration: underline;
    }
    .last{
        margin-right: 150px;
    }
    .navigation-bar h3 {
        margin-left: 50px;
        color: white;
        font-family: cursive;
        font-size: 2em;
    }
    .container {
        width: auto;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
    }
    .admin-dashboard{
        margin-top: 0px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
    }
    .card{
        margin-top: 100px;
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: -50px;
        overflow: hidden;
        width: 330px;
        height: 330px;
        text-align: center;
        border-radius: 15px;
        word-wrap: break-word;
        text-decoration: none;
        box-shadow: 0px 0px 10px 6px #eeeeee;
    }
    .card h1{
        font-family: "Poppins",sans-serif;
        padding: 5px;
        font-size: 3.5em;
        color: #000000;
    }
    .card p{
        font-family: "Poppins",sans-serif;
        color: #000000;
        padding: 5px;
        font-size: 2em;
    }
    .card button{
        padding: 10px;
        width: 200px;
        text-transform: capitalize;
        background-color: #ff8f00;
        border: 1px solid #ff8f00;
        border-radius: 10px;
        color: #ffffff;
        font-size: 1.2em;
    }

    .form-wrapper{
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 80px;
        border-radius: 3px;
        width: 100%;
    }
    .form-title{
        position: absolute;
        text-align: left;
        font-family: "Poppins", sans-serif;
        margin: 5px 5px 5px 5px;
    }
    .uploader-form{
        padding: 10px;
        border: 1px solid grey;
        border-radius: 3px;
        margin: 5px 5px 5px 600px;
    }
    .uploader-form label{
        font-family: "Poppins", sans-serif;
    }
    .uploader-form button{
        margin-top: 10px;
        padding: 7px;
    }
    .uploader-form input{
        margin-bottom: 3px;
        width: 700px;
        margin-top: 10px;
        padding: 7px;
        background-color: white;
        border: 1px solid grey;
        border-radius: 5px;
    }
    .uploader-form select{
        margin-top: 3px;
        margin-bottom: 3px;
        padding: 8px
    }
    .table-view{
        margin-top: 50px;
        width: 90%;
        border: none;
        justify-content: center;
    }
    .table-view table{
        border: none;
        width: 100%;
        justify-content: center;
        text-align: center;
    }
    .table-view thead{
        padding: 10px;
        background-color: #ff8f00;
        border: none;
    }
    .table-view th{
        padding: 10px;
        margin-left: 10px;
        text-transform: capitalize;
        font-family: "Poppins", sans-serif;
        letter-spacing: 0.5px;
    }
    .table-view td{
        text-transform: capitalize;
    }
    .Btn-Update button{
        padding: 7px;
        border-radius: 5px;
        border: 1px solid #76ff03;
        background-color: #76ff03;
        font-family: "Poppins", sans-serif;
        color: #ffffff;
        text-transform: capitalize;
    }
    .Btn-Update button:hover{
        transform: scale(1.1);
    }
    .Btn-Delete button{
        padding: 7px;
        border-radius: 5px;
        border: 1px solid #f44336;
        background-color: #f44336;
        font-family: "Poppins", sans-serif;
        color: #ffffff;
        text-transform: capitalize;
    }
    .Btn-Delete button:hover{
        transform: scale(1.1);
    }
    .table-user table{
        margin-top: 100px;
        border: none;
        width: 100%;
        justify-content: center;
        text-align: center;
    }
    .table-user thead{
        padding: 10px;
        background-color: #ff8f00;
        border: none;
    }
    .table-user th{
        padding: 10px;
        margin-left: 10px;
        text-transform: capitalize;
        font-family: "Poppins", sans-serif;
    }
    .table-user td{
        text-transform: capitalize;
    }
    .update-wrapper{
        margin-top: 100px;
    }
    .update-form {
        margin-top: 100px;
    }
    .delivery-status{
        position: relative;
    }
</style>
