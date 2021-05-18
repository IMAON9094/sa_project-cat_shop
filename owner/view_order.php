<?php

    require_once "connect.php";

    session_start();    

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
            <h1>รายการสั่งซื้อ</h1><br>
            <table width="100%" align="center" border="1">
                <tr>
                    <th>ID</th>
                    <th>order ID</th>
                    <th>Species</th>
                    <th>Cat color</th>
                    <th>Eye color</th>
                    <th>Cat age</th>
                    <th>Cat sex</th>
                    <th>Cat weight</th>
                    <th>Cat Price</th>
                    <th>Image</th>
                    <th>total price</th>
                    <th>name</th>
                    <th>shipment</th>
                    <th>image slip</th>
                </tr>
                <?php
                

                    $select_order = "SELECT * FROM `vieworder` ORDER BY 1 DESC";

                    $query_order = mysqli_query($conn, $select_order);

                    while($row = mysqli_fetch_array($query_order)){
                        $id = $row['id'];
                        $order_id = $row['basket_id'];
                        $order_totalprice = $row['basket_totalprice'];
                        $name_customer = $row['name_customer'];
                        $shipment = $row['shipment'];
                        $slip_image = $row['slip_image'];

                        $edit_query =  "SELECT * FROM posts WHERE post_id = '$order_id'";

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

                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $order_id; ?></td>
                    <td><?php echo $post_species; ?></td>
                    <td><?php echo $post_catcolor; ?></td>
                    <td><?php echo $post_eyecolor; ?></td>
                    <td><?php echo $post_catage; ?></td>
                    <td><?php echo $post_catsex; ?></td>
                    <td><?php echo $post_catweight; ?></td>
                    <td><?php echo $post_catprice; ?></td>
                    <td><img width="80" height="80" src="../img/admin/<?php echo $post_image; ?>"></td>
                    <td><?php echo $order_totalprice; ?></td>
                    <td><?php echo $name_customer; ?></td>
                    <td><?php echo $shipment; ?></td>
                    <td><img width="80" height="80" src="../img/slip/<?php echo $slip_image; ?>"></td>
                </tr>
                <?php } ?>

            </table>

        </div>


    </body>
</html>