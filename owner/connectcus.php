<?php
    $conn = mysqli_connect("localhost","catproject_sapj","IMaon9094","catproject_sapj");

    if(!$conn){
        die("Failed to connect to database" . mysqli_error());
    }
?>