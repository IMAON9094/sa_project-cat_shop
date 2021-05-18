<?php require_once "connectcus.php"; ?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>CAT store</title>
        <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
    </head>
    <body>

        <section class="content">
            <div class="container">

                <div style="text-align: right;">
                    <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='page21.php'">หน้าหลัก</button>
                    <br>
                    <button style="margin-right: 2rem; margin-top: 2rem" onclick="location.href='basket.php'">ตะกร้า</button>
                </div>

                <?php 
                
                    if(isset($_GET['id'])){
                        $page_id = $_GET['id'];

                        $select_posts = "SELECT * FROM posts WHERE post_id = '$page_id'";

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
                        <form action="basket.php?action=add&post_id=<?php echo $post_id; ?>" method="post">
                            <div class="cart-action">
                                <input type="text" class="product-quantity" name="quantity" value="1" size="2">
                                <input type=submit value="Add to cart" class="btnAddAction">
                            </div>
                        </form>
                    </figcaption>
                </figure>

                <?php   }

                    }
                ?>
            </div>
        </section>

    </body>
</html>