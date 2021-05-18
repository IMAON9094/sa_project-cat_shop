<?php

    session_start();
    
    if(!isset($_SESSION['username'])){
        header("location: logincustomer.php");
    }else {
    

?>


<?php require_once "connectcus.php"; ?>


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

        <div style="text-align: right;">
            <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='page21.php'">หน้าหลัก</button>
            <br>
            <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='basket.php'">ตะกร้า</button>
            <br>
            <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='logoutcustomer.php'">log out</button>
        </div>

        <section class="content">
            <div class="container">
                


                <?php 
                
                    $select_posts = "SELECT * FROM posts";
                    
                    $run_posts = mysqli_query($conn, $select_posts);

                    while($row = mysqli_fetch_array($run_posts)){
                        $post_id = $row['post_id'];
                        $post_species = $row['post_species'];
                        $post_catcolor = $row['post_catcolor'];
                        $post_eyecolor = $row['post_eyecolor'];
                        $post_catage = $row['post_catage'];
                        $post_catsex = $row['post_catsex'];
                        $post_catweight = $row['post_catweight'];
                        $post_catprice = $row['post_price'];
                        $post_image = $row['post_image'];

                        //content show for read more but this pg and db doesn't have
                        //$post_content = substr($row['post_content'],0,300);



                    
                
                ?>

                <!--content 1-->
                <figure>
                    <h1><?php echo $post_species; ?></h1>
                    <img width="350px" src="../img/admin/<?php echo $post_image; ?>" alt="cat">
                    <figcaption>
                        <p> <strong><?php echo $post_species; ?></strong> </p>
                        <p> price: <?php echo $post_catprice; ?> bath</p>
                        <p> cat color: <?php echo $post_catcolor; ?></p>
                        <p> cat eye color: <?php echo $post_eyecolor; ?></p>
                        <p> cat age: <?php echo $post_catage; ?></p>
                        <p> cat sex: <?php echo $post_catsex; ?></p>
                        <p> cat weight: <?php echo $post_catweight; ?></p>
                        <a href="page.php?id=<?php echo $post_id; ?>"> READ MORE</a>
                    </figcaption>
                </figure>

                
                <?php } ?>


            </div>
        </section>

    </body>
</html>

<?php
    }
?>