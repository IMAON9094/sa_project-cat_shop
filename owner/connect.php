<?php
    $conn = mysqli_connect("localhost","root","","sapj");

    if(!$conn){
        die("Failed to connect to database" . mysqli_error());
    }
?>