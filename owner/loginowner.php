<?php

    require_once "connect.php";

    session_start();

    if(isset($_POST['Login'])){

        $username = mysqli_real_escape_string($conn, $_POST['username'] );
        $password = mysqli_real_escape_string($conn, $_POST['password'] );

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $query);


        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Successfully');</script>";
            header("location: page00.php");
        }else{
            echo "<script>alert('Login Fail! please check your username or password');</script>";
        }

    }


?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>CAT store</title>
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1> <a href="../index.html">JIRANTHANIN CAT SHOP </a></h1>
            </div>
        </header>
        <div style="text-align: center;">
            <h2>admin log in</h2>
            <img src="../img/other/adminpic.png" width="200"><br><br>
        </div>

        <div style="text-align: center;">
            <form action="loginowner.php" method="post">
                USER NAME : <input type="text" name="username"><br><br>
                PASSWORD  : <input type="password" name="password"><br><br>
                <input class="w3-btn w3-teal" type="submit" name="Login" value="Login">
            </form>

        </div>


    </body>
</html>