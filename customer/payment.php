<?php

/////////เอาข้อมูลลงdb/////////////

    session_start();

    require_once('connectcus.php');
    if(isset($_POST['submit'])){

        $name_customer = $_POST['name_customer'];
        $shipment = $_POST['shipment'];
        $slip_image = $_FILES['paymentbill']['name'];
        $image_tmp = $_FILES['paymentbill']['tmp_name'];

        move_uploaded_file($image_tmp, "../img/slip/$slip_image");

        $edit_query =  "SELECT * FROM `basketorder` WHERE id";

        $run_edit = mysqli_query($conn, $edit_query);

        while($edit_row = mysqli_fetch_array($run_edit)){
            $bsk_id = $edit_row['id'];
            $order_id = $edit_row['basket_id'];
            $order_totalprice = $edit_row['basket_totalprice'];
        }



        $insert_query_vieworder = "INSERT INTO `vieworder`(`id`, `basket_id`, `basket_totalprice`, `name_customer`, `shipment`, `slip_image`) 
                                    VALUES ('','$order_id','$order_totalprice','$name_customer','$shipment','$slip_image')";


        if(mysqli_query($conn, $insert_query_vieworder)){
            echo "<script>alert('Post update successfully');</script>";

            $delete_id = $_GET['del'];

            $delete_query = "DELETE FROM basketorder WHERE id = '$bsk_id'";

            if(mysqli_query($conn, $delete_query)){
                echo "<script>alert('Post has been deleted')</script>";
                header("location: pageQRcode2.html");
            }



            //เด้งอัพเดตเสร็จจะเปลี่ยนไปหน้าview_stock.php
            //header("location: pageQRcode2.html");
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

        <style>
            button{
                padding:20px 50px;
                font-size: 1.5rem;
                cursor: pointer;
                border: 0px;
                background: transparent;
                position: relative;
                margin: 20px;
                transition: all 0.25s ease;
            }
            .btn-1{
                color: #fff;
                overflow: hidden;
                border-radius: 30px;
                box-shadow: 0px -0px 0px 0px rgba(143, 64, 248, 0.5),0px 0px 0px 0px rgba(39, 200, 255, 0.5);
            }
            .btn-1:hover{
                transform: translate(0, -6px);
                box-shadow: 10px -10px 25px  0px rgba(143, 200, 255, 0.5), -10px 10px 25px 0px rgba(39, 200, 255, 0.5);
            }
            .btn-1:hover::after{
                transform: rotate(150deg);
            }

            .btn-1::after{
                content: "";
                width: 400px;
                height: 400px;
                position: absolute;
                top: -50px;
                left: -100px;
                background-color: #ff3cac;
                background-image: linear-gradient(225deg,#27d86c 0%,#26caf8 50%,#c625d0 100%);
                z-index: -1;
                transition: all 0.25s ease;
            }

        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <h1> <a href="../index.html">JIRANTHANIN CAT SHOP </a></h1>
            </div>
        </header>


        <!---ของข้าวฟ่าง-->
        <div>
            <br>
            <br>
            <br>
            <br>
            <div style="text-align: center;">
                
                <p><font size="15">การชำระเงิน</font></p>

            <div style="text-align: center;">
            <img src="../img/qrcodepic/qr2.png"   alt="qrcode" srcset="">
            <p><font size="5">Scan me</font></p>
            <br>

            <p>กรุณาแนบไฟล์หลักฐานการชำระเงิน</p>
            <form action="" method="POST" enctype="multipart/form-data">
                <p>ช่องทางการติดต่อ(กรุณาใส่ข้อมูลให้ครบทุกช่อง)</p>
                <p>ชื่อนามสกุล: <input type="text" name="name_customer"></p>
                <p>ที่อยู่-เบอร์โทร Or สถานที่นัดรับ-เบอร์โทร : <br><textarea name="shipment" rows="4" cols="50"></textarea></p>
                <input type="file" name="paymentbill"><br>
                <input type="submit" name="submit" value="submit">
            </form>
            
            <br>                         
             <!--

            <button onclick="location.href='pageQRcode2.html'" class="btn-1">ชำระเงิน</button>

             -->
        </div>
        

        

    </body>
</html>