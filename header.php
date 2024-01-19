<?php
include 'connection.php';

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
    <!--Swiper CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
    <!--Header-->
    <header>
        <a href="#" class="logo"><img src="Images/restaurant.png" alt="reslogo">OuterClove.</a>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="about.php">About</a>
            <a href="menu.php">Menu</a>
            <a href="review.html">Review</a>
            <a href="reservation.php">Reservation</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="add.php" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-sign-in-alt"></a>
        </div>
        <div class="profile">
            <h1>User Account</h1>
            <p class="account"><a href="login.php">login</a> or <a href="register.php">register</a></p>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>