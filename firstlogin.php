<?php

$con = mysqli_connect("localhost","root","","harshuserdata");


// Signup Process
if (isset($_POST['register_submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $insert_sql = "INSERT INTO users(name,password,email) VALUES('$name','$password','$email')";
    $res = mysqli_query($con,$insert_sql);
}

// Login Process
session_start();
if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        header("Location: index.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to anime corner</title>
  <style>
     @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        border-radius: 10px;
        }
        .form {
        position: relative;
        z-index: 1;
        background: #0f9cff00;;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        border-radius: 10px;
        }
        .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        border-radius: 10px;
        }
        .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #05445E;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        border-radius: 10px;
        }
        .form button:hover,.form button:active,.form button:focus {
        background: #189AB4;
        }
        .form .message {
        margin: 15px 0 0;
        color: #000000a8;;
        font-size: 12px;
        }
        .form .message a {
        color: #c058db;;
        text-decoration: none;
        }
        .form .register-form {
        display: none;
        }
        .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
        }
        .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
        }
        .container .info {
        margin: 50px auto;
        text-align: center;
        }
        .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
        }
        .container .info span {
        color: #4d4d4d;
        font-size: 12px;
        }
        .container .info span a {
        color: #000000;
        text-decoration: none;
        }
        .container .info span .fa {
        color: #EF3B3A;
        }
        body {
          background-image: url("images/up.png");   
        }
  </style>
</head>
<body>
<div class="login-page">
        <div class="form">

            <!-- SignUp Form -->
            <form action="" method="post" class="register-form">
                <input type="text" name="name" placeholder="name" required="required"/>
                <input type="password" name="password" placeholder="password" required="required"/>
                <input type="text" name="email"  placeholder="email address" required="required"/>
                <button type="submit" name="register_submit">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            
            <!-- Login Form -->
            <form action="" method="post" class="login-form">
                <input type="text" name="email" placeholder="Email" required="required"/>
                <input type="password" name="password" placeholder="password" required="required"/>
                <button type="submit" name="login_submit">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
    <script>
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>
  
</body>
</html>