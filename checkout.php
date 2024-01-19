<?php
require 'connection.php';
session_start();

if(isset($_POST['submit'])) {
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $payment = $_POST['payment'];
   $ad = "/^(\\d{1,}) [a-zA-Z0-9\\s]+(\\,)? [a-zA-Z]+(\\,)? [A-Z]{2} [0-9]{5,6}$/";

   if(empty($name) || empty($phone) || empty($address) || empty($payment)){
      echo "<script>alert('Please Enter User Details!')</script>";
   }
   elseif(!preg_match ("/^[a-zA-Z\s]*$/", $name)){
      echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
   }
   elseif (!preg_match ("/^[0-9]*$/", $phone)){  
      echo "<script>alert('Only numeric value is allowed!');</script>";
   }
   elseif(!preg_match ($ad, $address)){
      echo "<script>alert('Enter an accurate address!');</script>";
   }
   elseif(!preg_match ("/^[a-zA-Z\s]*$/", $payment)){
      echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
   }
   else{
      $grandTotal = 0;

      $stmt = mysqli_prepare($conn, "INSERT INTO orders(title, price, quantity, total, alltotal, name, phone, address, payment)
      VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

      if($stmt){
         foreach($_SESSION['cart'] as $item){
            $title = $item['title'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $totalPrice = $price * $quantity;
            $grandTotal += $totalPrice;
            mysqli_stmt_bind_param($stmt, "sssssssss", $title, $price, $quantity, $totalPrice, $grandTotal, $name, $phone, $address, $payment);
            mysqli_stmt_execute($stmt);
         }
         mysqli_stmt_close($stmt);
         unset($_SESSION['cart']);
      }else{
         echo "Error: " . mysqli_error($conn);
      }
   }
}
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
   <section class="heading" style="padding-top: 8rem;">
      <h3>checkout</h3>
      <p><a href="index.html">home </a> <span> / checkout</span></p>
   </section>
   <section class="checkout">
      <div>
         <h1 class="title">order summary</h1>
         <form action="" method="post">
            <?php
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
               $grandTotal = 0;

               foreach ($_SESSION['cart'] as $item) {
                  $totalPrice = $item['price'] * $item['quantity'];
                  $grandTotal += $totalPrice;
            ?>
            <div class="cart-items">
               <h3><?= $item['title']; ?></h3>
               <p>Price: Rs <?= $item['price']; ?></p>
               <p>Quantity: <?= $item['quantity']; ?></p>
               <p>Total: Rs <?= $totalPrice; ?></p>
            </div>
            <?php
               }
            ?>
            <div class="cart-items">
               <p><span>grand total : </span>Rs <span><?= $grandTotal; ?></span></p>
               <a href="add.php" class="btn">View Cart</a>
            </div>
            <?php
               } else {
                  echo "<h1>Your Cart Is Empty!</h1>";
               }
            ?>
         </form>
         <div class="user-info">
            <h1>enter your info</h1>
            <form action="" method="post"  onsubmit="return confirm('Are you sure you want to place this order?');">
               <input type="text" name="name" placeholder="Enter Name..." autocomplete="off">
               <input type="number" name="phone" placeholder="Enter Phone No..." autocomplete="off">
               <input type="text" name="address" placeholder="Street Name, City, State ZIP code..." autocomplete="off" style="text-transform: none;">
               <input type="text" name="payment" placeholder="Enter Payment Method (cash/credit)..." autocomplete="off">
               <input type="submit" name="submit" value="place order" class="btn">
            </form>
         </div>
      </div>
   </section>
   <section class="footer">
      <?php include "footer.php" ?>
   </section>   
   <script src="script.js"></script>
</body>
</html>