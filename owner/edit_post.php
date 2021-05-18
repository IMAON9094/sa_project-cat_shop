<?php

    require_once "connect.php";

    session_start();

    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }

    if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];

        $edit_query =  "SELECT * FROM posts WHERE post_id = '$edit_id'";

        $run_edit = mysqli_query($conn, $edit_query);

        while($edit_row = mysqli_fetch_array($run_edit)){

            $post_id = $edit_row['post_id'];
            $post_species = $edit_row['post_species'];
            $post_catcolor = $edit_row['post_catcolor'];
            $post_eyecolor = $edit_row['post_eyecolor'];
            $post_catage = $edit_row['post_catage'];
            $post_catsex = $edit_row['post_catsex'];
            $post_catweight = $edit_row['post_catweight'];
            $post_catprice = $edit_row['post_price'];
            $post_image = $edit_row['post_image'];

        }

    }

    if(isset($_POST['submit'])){
        $update_id = $_GET['edit_form'];
        $post_species = $_POST['species'];
        $post_catcolor = $_POST['catcolor'];
        $post_eyecolor = $_POST['eyecolor'];
        $post_catage = $_POST['catage'];
        $post_catsex = $_POST['catsex'];
        $post_catweight = $_POST['catweight'];
        $post_catprice = $_POST['price'];
        $post_image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_tmp, "../img/admin/$post_image");

        $update_query = "UPDATE posts
        SET post_species = '$post_species' , post_catcolor = '$post_catcolor' ,
        post_eyecolor = '$post_eyecolor' , post_catage = '$post_catage' , post_catsex = '$post_catsex',
        post_catweight = '$post_catweight' , post_price = '$post_catprice', post_image = '$post_image' 
        WHERE post_id = '$update_id';";
    

        if(mysqli_query($conn, $update_query)){
            echo "<script>alert('Post has been edit');</script>";
            header("location: view_stock.php");
        }else{
            echo "<script>alert('somthing wrong (edit)');</script>";
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
        

        <div style="text-align: center;">
            <form action="edit_post.php?edit_form=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">

                <table width="100%" align="center" border="1">

                    <tr>
                        <td align="center" colspan="6"><h1>UPDATE STOCK</h1></td>   
                    </tr>
                    <tr>
                        <td> ชื่อพันธุ์ </td>   
                        <td><input type="text" name="species" size="50" value="<?php echo "$post_species"; ?>"></td> 
                    </tr> 
                    <tr>
                        <td> สีขน </td>   
                        <td><input type="text" name="catcolor" size="50" value="<?php echo "$post_catcolor"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> สีตา </td>   
                        <td><input type="text" name="eyecolor" size="50" value="<?php echo "$post_eyecolor"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> อายุ </td>   
                        <td><input type="text" name="catage" size="50" value="<?php echo "$post_catage"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> เพศ </td>   
                        <td><input type="text" name="catsex" size="50" value="<?php echo "$post_catsex"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> น้ำหนัก </td>   
                        <td><input type="text" name="catweight" size="50" value="<?php echo "$post_catweight"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> ราคา </td>   
                        <td><input type="text" name="price" size="50" value="<?php echo "$post_catprice"; ?>"></td> 
                    </tr>
                    <tr>
                        <td> รูป </td>   
                        <td><input type="file" name="image" size="50"><img width="100" height="100" src="../img/admin/<?php echo $post_image; ?>"></td> 
                    </tr>
                    <tr> 
                        <td>  </td>
                        <td align="center">
                            <input type="submit" name="submit" value="update">
                        </td> 
                    </tr>
                </table>

            </from>

        </div>

    </body>
</html>