<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Images/restaurant.png">
    <title>Outer Clove Restaurant</title>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <!--Google Font - Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Work+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="box">
        <h1>Staff Panel</h1>
        <div class="contain">
            <h1 style="font-size:2rem; margin-top: 0.6rem; color: #c4e3ff;">Activities</h1>
            <div class="btn"><a href="viewProducts.php" style="color: #fff; text-decoration: none;">View Products</a></div>
            <div class="btn"><a href="viewCustomers.php" style="color: #fff; text-decoration: none;">View Customers</a></div>
            <div class="btn"><a href="viewReservations.php" style="color: #fff; text-decoration: none;">View Reservations</a></div>
            <div class="btn"><a href="viewOrders.php" style="color: #fff; text-decoration: none;">View Orders</a></div>
        </div>
    </div>
</body>
</html>