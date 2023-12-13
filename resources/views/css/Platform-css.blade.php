<style>
    body {
        margin: 0;
        padding: 0;
    }
    .navigation-bar header{
        height: 70px;
        margin-right: 0px;
        position: fixed;
        width: 100%;
        background-color: #f44336;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
    }
    .navigation-bar nav{
        margin-left: 300px;
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
    .navigation-bar h3 {
        margin-left: 50px;
        color: white;
        font-family: cursive;
        font-size: 2em;
    }
    .last{
        margin-right: 70px;
    }
    .username img{
        position: absolute;
        transform: translateY(-10px);
        margin-left: 10px;
        border-radius: 100px;
        height: 40px;
        width: 40px;
    }
    .username{
        margin-left: 10px;
        text-transform: capitalize;
        margin-right: 70px;
    }
    .container {
        width: auto;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-left: 200px;
    }
    .restaurant-card {
        margin-top: 100px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: -50px;
        overflow: hidden;
        width: 330px;
        height: auto;
        background-color: #ffffff;
        text-align: center;
        border-radius: 15px;
        word-wrap: break-word;
        box-shadow: 0px 0px 10px 6px #eeeeee;
    }
    .restaurant-card img {
        width: 330px;
        height: 240px;
    }
    .restaurant-card:hover{
        background-color: #fafafa;
        transform: scale(1.01);
    }
    .restaurant-card h3 {
        font-family: "Poppins",sans-serif;
        text-transform: capitalize;
        position: relative;
        font-size: 2em;
        color: black;
    }
    .restaurant-card p {
        margin-top: -30px;
        position: relative;
        font-size: 1.0em;
        font-style: italic;
        color: black;
    }
    .restaurant-card button {
        position: relative;
        margin-bottom: 20px;
        padding: 8px;
        width: 220px;
        background-color: #d50000;
        border: 2px solid #d50000;
        border-radius: 30px;
        color: whitesmoke;
        font-size: 1em;
        cursor: pointer;
        text-transform: capitalize;
    }
    .restaurant-card button:hover {
        background-color: #f44336;
        border: 2px solid #f44336;
    }
    .menu-card{
        position: relative;
        margin-top: 100px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: -50px;
        overflow: hidden;
        width: 200px;
        height: auto;
        background-color: #ffffff;
        text-align: center;
        border-radius: 15px;
        word-wrap: break-word;
        box-shadow: 0px 0px 10px 7px #eeeeee;
    }
    .menu-card:hover{
        background-color: #fafafa;
        transform: scale(1.01);
    }
    .menu-card h3{
        font-family: "Poppins",sans-serif;
        text-transform: capitalize;
        position: relative;
        font-size: 1em;
        color: black;
    }
    .menu-card img{
        width: 200px;
        height: 150px;
    }
    .menu-card h1{
        font-family: "Poppins",sans-serif;
        text-transform: capitalize;
        position: relative;
        font-size: 1.5em;
        color: black;
    }
    .menu-card p{
        margin-top: -30px;
        position: relative;
        font-size: 1.0em;
        font-style: italic;
        color: black;
    }
    .menu-card button{
        padding: 10px;
        color: white;
        text-transform: capitalize;
        margin-top: -55px;
        margin-bottom: 40px;
    }
    .order-now{
        position: relative;
        background-color: #d50000;
        border: 1px solid #d50000;
        border-radius: 5px;
    }
    .order-now:hover{
        border: 1px solid #f44336;
        background-color: #f44336;
        transform: scale(1.1);
    }
    .add-to-cart{
        margin-top: 100px;
        position: relative;
        background-color: #ff9800;
        border: 1px solid #ff9800;
        border-radius: 5px;
    }
    .add-to-cart:hover{
        border: 1px solid #ffa726;
        background-color: #ffa726;
        transform: scale(1.1);
    }
    .side-bar{
        width: 200px;
        margin-left: 7px;
        margin-right: 7px;
        height: 500px;
        position: fixed;
    }
    .side-bar-wrapper{
        position: relative;
    }
    .side-bar-menu{
        border: 2px solid #eeeeee;
        border-radius: 10px;
        margin-top: 15px;
        height: 200px;
        overflow: scroll;
    }
    .side-bar-menu a{
        padding: 7px;
        height: 15px;
        font-family: "Poppins",sans-serif;
        color: black;
        text-decoration: none;
        font-size: auto;
    }
    .sidebar-profile{
        position: relative;
        border-radius: 20px;
        border: 2px solid #eeeeee;
        padding: 10px;
        word-wrap: break-word;
    }
    .sidebar-profile button{
        width: 90%;
        padding: 10px;
        border-radius: 10px;
        border: 1px solid #f44336;
        background-color: #f44336;
        font-size: .9em;
        text-transform: capitalize;
        color: #ffffff;

    }
    .side-bar button:hover{
        transform: scale(1.1);
        border: 1px solid #d50000;
        border-radius: 10px;
        background-color: #d50000;
    }
    .userid, .name, .email, .phone{
        font-size: 0.9em;
        color: #000000;
        margin-top: -2px;
        font-weight: 700;
    }
    .indicator{
        transform: translateY(-22px);
        position: absolute;
        font-size: 0.6em;
    }
    .side-bar-profile-pic{
        transform: translateX(40px);
        border-radius: 500px;
        width: 100px;
        height: 100px;
        overflow: hidden;
        justify-content: center;
        border: 2px solid #eeeeee;
    }
    .side-bar-profile-pic img{
        width: 100px;
        height: 100px;
    }
    .sec-mycart{
        margin-top: 50px;
    }
    .cart-cards{
        margin-top: 100px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: -50px;
        overflow: hidden;
        width: 200px;
        height: auto;
        background-color: #ffffff;
        text-align: center;
        border-radius: 15px;
        word-wrap: break-word;
        box-shadow: 0px 0px 10px 6px #eeeeee;
    }
    .cart-cards img {
        width: 200px;
        height: 150px;
    }
    .cart-cards:hover{
        transform: scale(1.01);
        background-color: #fafafa;
    }
    .cart-cards h3 {
        font-family: "Poppins",sans-serif;
        text-transform: capitalize;
        position: relative;
        font-size: 1em;
        color: black;
    }
    .cart-cards p {
        margin-top: -30px;
        position: relative;
        font-size: 1.0em;
        font-style: italic;
        color: black;
    }
    .cart-cards button {
        position: relative;
        margin-bottom: 10px;
        padding: 8px;
        width: 150px;
        /* background-color: #d50000;
        border: 2px solid #d50000; */
        border-radius: 30px;
        color: whitesmoke;
        font-size: 0.9em;
        cursor: pointer;
        text-transform: capitalize;
        font-weight: 700;
    }
    .ordernow{
        background-color: #ffa726;
        border: 1px solid #ffa726;

    }
    .ordernow:hover {
        background-color: #ff9800;
        border: 1px solid #ff9800;
    }
    .removefromcart{
        background-color: #f44336;
        border: 1px solid #f44336;
    }
    .removefromcart:hover{
        background-color: #d50000;
        border: 1px solid #d50000;
    }
    .order-content{
        margin-top: 100px;
    }

    .sidebar-profile {
        margin-top: 100px;
        font-family: "Poppins", sans-serif;
    }
    .userid{
        text-transform: capitalize;
    }
    .name{
        text-transform: capitalize;
    }
    .sec-delivery{
        margin-top: 50px;
    }
    .sec-history{
        margin-top: 50px;
    }
    .profile-sec{
        margin-left: 20px;
        width: 100%;
        margin-top: 100px;
    }
    .profile-sec img{
        height: 200px;
        width: 200px;
        position: absolute;
        transform: translateX(890px) translateY(-70px);
        border-radius: 100px;
    }
    .profile-sec button{
        border-radius: 7px;
        margin-left: 15px;
        width: 200px;
        padding: 10px;
        color: #ffffff;
        font-size: 1.2em;
        font-weight: 700;
    }
    .profile-sec button:hover{
        transform: scale(1.05);
    }
    .btnUpdateprofile, .btnUpdatepassword{
        background-color: #ffa726;
        border: 1px solid #ffa726;
    }
    .btnUpdateprofile:hover, .btnUpdatepassword:hover{
        background-color: #ff9800;
        border: 1px solid #ff9800;
    }
    .btnSignout{
        background-color: #f44336;
        border: 1px solid #f44336;
    }
    .btnSignout:hover{
        background-color: #d50000;
        border: 1px solid #d50000;
    }
    .sec-btn{
        margin-top: 50px;
        margin-left: 450px;
        display: flex;
        flex-direction: row;
    }
    .sec-details h1{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 3em;
        letter-spacing: 4px;
    }
    .sec-details label{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.5em;
        font-weight: 700;
    }
    .sec-details span{
        font-size: 1.5em;
    }
    .user-stat{
        margin-top: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.5em;
        font-weight: 700;
    }
    .order-content{
        margin-left: 30px;
        width: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .order-content label{
        font-size: 1.2em;
        font-weight: 600;
        margin-top: 50px;
        position: relative;
    }
    .order-content img{
        position: absolute;
        width: 400px;
        height: 350px;
        transform: translateX(500px) translateY(-200px);
    }
    .order-content input{
        padding: 7px;
        width: 100px;
    }
    .delivery-cards{
        margin-top: 100px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: -50px;
        overflow: hidden;
        width: 90%;
        height: 200px;
        background-color: #ffffff;
        border-radius: 15px;
        word-wrap: break-word;
        box-shadow: 0px 0px 10px 6px #eeeeee;
    }
    .details{
        margin-top: 10px;
        height: 200px;
        width: 60%;
        word-wrap: break-word;
    }
    .details label{
        padding: 10px;
        font-family: "Poppins", sans-serif;
    }
    .right{
        margin-bottom: 10px;
    }
    .left{
        transform: translateX(150px) translateY(10px);
    }
    .delivery-cards img {
        transform: translateX(800px) translateY(-220px);
        width: 250px;
        height: 200px;
    }
    .btn-cancel{
        position: absolute;
    }
    .form-wrapper{
        margin-top: 100px;
    }
</style>
