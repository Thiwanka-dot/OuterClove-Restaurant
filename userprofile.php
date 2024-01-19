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
    <link rel="stylesheet" href="style.css">
    <!--Google Font - Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Work+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "header.php" ?>
    <section class="user-profile">
        <div class="logo">
            <img src="Images/restaurant.png" alt="logo">
            <h1>your profile</h1>
        </div>
        <div class="adjust">
            <div class="user">
                <h2>User Activities</h2>
                <a href="index.html" class="btn">Home</a>
                <a href="add.php" class="btn">View Orders</a>
                <a href="review.html" class="btn">View Reviews</a>
                <a href="menu.php" class="btn">Add food</a>
            </div>
        </div>
    </section>
    <?php include "footer.php" ?>
    <script src="script.js"></script>
</body>
</html>