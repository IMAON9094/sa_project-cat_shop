<?php


    session_start();
    
    require_once "connect.php";

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


?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>CAT store</title>
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1> <a href="../index.html">JIRANTHANIN CAT SHOP </a></h1>
            </div>
        </header>
        <div>
            <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='page00.php'">admin</button>
        </div>

        <div style="text-align: center;">
            <form actionn="update_stock.php" method="post" enctype="multipart/form-data">

                <table width="100%" align="center" border="1">

                    <tr>
                        <td align="center" colspan="6"><h1>UPDATE STOCK</h1></td>   
                    </tr>
                    <tr>
                        <td> ชื่อพันธุ์ </td>   
                        <td><input type="text" name="species" size="50"></td> 
                    </tr> 
                    <tr>
                        <td> สีขน </td>   
                        <td><input type="text" name="catcolor" size="50"></td> 
                    </tr>
                    <tr>
                        <td> สีตา </td>   
                        <td><input type="text" name="eyecolor" size="50"></td> 
                    </tr>
                    <tr>
                        <td> อายุ </td>   
                        <td><input type="text" name="catage" size="50"></td> 
                    </tr>
                    <tr>
                        <td> เพศ </td>   
                        <td><input type="text" name="catsex" size="50"></td> 
                    </tr>
                    <tr>
                        <td> น้ำหนัก </td>   
                        <td><input type="text" name="catweight" size="50"></td> 
                    </tr>
                    <tr>
                        <td> ราคา </td>   
                        <td><input type="text" name="price" size="50"></td> 
                    </tr>
                    <tr>
                        <td> รูป </td>   
                        <td><input type="file" name="image" size="50"></td> 
                    </tr>
                    <tr> 
                        <td>  </td>
                        <td align="center">
                            <input type="submit" name="submit" value="submit">
                        </td> 
                    </tr>
                </table>

            </from>

        </div>

    </body>
</html>