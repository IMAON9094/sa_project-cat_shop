<?php

    require_once "connectcus.php";

    session_start();

    if(isset($_POST['Login'])){

        $usernamecus = mysqli_real_escape_string($conn, $_POST['username'] );
        $passwordcus = mysqli_real_escape_string($conn, $_POST['password'] );

        $querycus = "SELECT * FROM customer WHERE username = '$usernamecus' AND password = '$passwordcus'";

        $resultcus = mysqli_query($conn, $querycus);


        if(mysqli_num_rows($resultcus) > 0){
            $_SESSION['username'] = $usernamecus;
            echo "<script>alert('Login Successfully');</script>";
            header("location: page21.php");
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
            <h2>customer log in</h2>
            <img src="../img/other/customerpic.png" width="250"> 
        </div>
        <div style="text-align: center;">
            <form action="logincustomer.php" method="post">
                USER NAME : <input type="text" name="username"><br><br>
                PASSWORD  : <input type="password" name="password"><br><br>
                <input class="w3-btn w3-teal" type="submit" name="Login" value="Login">
            </form>
            <br>
            <button class="w3-btn w3-teal"  onclick="location.href='register.php'">register</button>
        </div>


    </body>
</html>