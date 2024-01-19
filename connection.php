<?php
    $dbhost = "localhost";
    $dbserver = "outerclove";
    $dbuser = "root";
    $dbpass = "";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbserver);

    if (!$conn) {
        die("Connection Failed!!" . mysqli_connect_error());
    }
?>