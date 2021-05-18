<?php

    require_once "connect.php";

    session_start();

    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }else{
        

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
            <h1>edit stock or delete stock</h1><br>
            <table width="100%" align="center" border="1">
                <tr>
                    <th>stock ID</th>
                    <th>Species</th>
                    <th>Cat color</th>
                    <th>Eye color</th>
                    <th>Cat age</th>
                    <th>Cat sex</th>
                    <th>Cat weight</th>
                    <th>Cat Price</th>
                    <th>Image</th>
                    <th>Delete stock</th>
                    <th>Edit Stock</th>
                </tr>
                
                <?php
                

                    $select_stock = "SELECT * FROM `posts` ORDER BY 1 DESC";

                    $query_stock = mysqli_query($conn, $select_stock);

                    while($row = mysqli_fetch_array($query_stock)){
                        $post_id = $row['post_id'];
                        $post_species = $row['post_species'];
                        $post_catcolor = $row['post_catcolor'];
                        $post_eyecolor = $row['post_eyecolor'];
                        $post_catage = $row['post_catage'];
                        $post_catsex = $row['post_catsex'];
                        $post_catweight = $row['post_catweight'];
                        $post_catprice = $row['post_price'];
                        $post_image = $row['post_image'];
                    


                ?>
                    <tr>
                        <td><?php echo $post_id; ?></td>
                        <td><?php echo $post_species; ?></td>
                        <td><?php echo $post_catcolor; ?></td>
                        <td><?php echo $post_eyecolor; ?></td>
                        <td><?php echo $post_catage; ?></td>
                        <td><?php echo $post_catsex; ?></td>
                        <td><?php echo $post_catweight; ?></td>
                        <td><?php echo $post_catprice; ?></td>
                        <td><img width="80" height="80" src="../img/admin/<?php echo $post_image; ?>"></td>
                        <td><a href="delete.php?del=<?php echo $post_id ?>">Delete</a></td>
                        <td><a href="edit_post.php?edit=<?php echo $post_id ?>">Edit</a></td>
                    </tr>
                <?php } ?>


            </table>

        </div>


    </body>
</html>



<?php

    }

?>