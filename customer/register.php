<?php

/*
    session_start();
    
    require_once "connectcus.php";

    if(!isset($_SESSION['username'])){
        header('location: loginowner.php');
    }


    if(isset($_POST['submit'])){

        $post_species = $_POST['species'];
        $post_catcolor = $_POST['catcolor'];
        $post_eyecolor = $_POST['eyecolor'];
        $post_catage = $_POST['catage'];
        $post_catsex = $_POST['catsex'];
        $post_catweight = $_POST['catweight'];
        $post_price = $_POST['price'];
        $post_img = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "../img/admin/$post_img");

        $insert_query = "INSERT INTO `posts`(`post_id`, `post_species`, `post_catcolor`,`post_eyecolor`, `post_catage`, `post_catsex`, `post_catweight`, `post_price`, `post_image`) 
                        VALUES ('','$post_species', '$post_catcolor', '$post_eyecolor', '$post_catage', '$post_catsex', '$post_catweight', '$post_price', '$post_img') ";

        if(mysqli_query($conn, $insert_query)){
            echo "<script>alert('Post update successfully');</script>";
            //เด้งอัพเดตเสร็จจะเปลี่ยนไปหน้าview_stock.php
            header("location: view_stock.php");
            //ไม่อยากเด้งก็ไม่ใส่ก็ได้
        }else{
            echo "<script>alert('somthing wrong');</script>";
        }





    }
*/

    session_start();
    
    require_once "connectcus.php";

    if(isset($_POST['submit'])){
        $reg_username = $_POST['username'];
        $reg_password = $_POST['password'];
        $reg_cf_password = $_POST['cf_password'];

        if($reg_password === $reg_cf_password AND $reg_username!="" AND $reg_password!=""){
            $insert_query = "INSERT INTO `customer`(`id`,`username`,`password`) VALUES ('','$reg_username','$reg_password') ";

            if(mysqli_query($conn, $insert_query)){
                echo "<script>alert('Register Successful');</script>";
                header("location: logincustomer.php");

            }
            else{
                echo "<script>alert('somthing wrong');</script>";
            }


        }else if($reg_username==""){
            echo "<script> alert('enter username');  </script>";
        }else if($reg_password==""){
            echo "<script> alert('enter password');  </script>";
        }else{
            echo "<script> alert('plz check your password');  </script>";
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
            <h1> REJISTER </h1><br>
            <img src="../img/other/catregis.png" width="200"><br>
        </div>

        <div style="text-align: center;">
            <div>
                <form action="register.php" method="post">
                    <br>
                    <p>&emsp;&emsp;&emsp;&emsp;  USER NAME : <input type="text" name="username"></p><br><br>
                    <p>&emsp;&emsp;&emsp;&emsp; PASSWORD  : <input type="password" name="password"></p><br><br>
                    <p>CONFIRM PASSWORD : <input type="password" name="cf_password"></p><br><br>
                    <input class="w3-btn w3-teal" type="submit" name="submit" value="submit" >
                </form>
            </div>

        </div>

    </body>
</html>