<?php

    session_start();
    
    if(!isset($_SESSION['username'])){
        header("location: loginowner.php");
    }else {


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
        

        <div style="text-align: center;" >
            <img src="../img/other/catpage00.png" width="500" ><br>
            <button style="margin-top: 5rem;" onclick="location.href='view_order.php'">view order</button>
            <button style="margin-top: 5rem;" onclick="location.href='update_stock.php'">update stock</button>
            <button style="margin-top: 5rem;" onclick="location.href='view_stock.php'">edit/delete stock</button>
            <button style="margin-top: 5rem;" onclick="location.href='logoutowner.php'">log out</button>
        </div>

        


    </body>
</html>


<?php
    }
?>
