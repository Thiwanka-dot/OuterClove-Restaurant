<?php
require 'connection.php';

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $number = $_POST['number'];
    $pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    if(empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($number)){
        echo "<script>alert('Please fill all the fields!');</script>";
    }
    elseif(!preg_match ("/^[a-zA-Z\s]*$/", $name)){
        echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
    }
    elseif(!preg_match ($pattern, $email)){  
        echo "<script>alert('Invalid Email Format!');</script>";
    }
    elseif (!preg_match ("/^[0-9]*$/", $phone)){  
        echo "<script>alert('Only numeric value is allowed!');</script>";
    }
    elseif (!preg_match ("/^[0-9]*$/", $number)){  
        echo "<script>alert('Only numeric value is allowed!');</script>";
    }
    else{
        $query = "INSERT INTO reservation(name, email, phone, date, time, number) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssissi", $name, $email, $phone, $date, $time, $number);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die('Could not enter data: ' . mysqli_error($conn));
        } else {
            echo "<script>alert('Reservation Is Completed!')</script>";
            header('Location: index.html');
            exit;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
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
    <!--Reservation-->
    <section class="about" id="about" style="padding-top: 8rem;">
        <h3 class="sub-heading"> reservation </h3>
        <h1 class="heading"> want to eat with us? </h1>
        <div class="order">
            <form action="reservation.php" method="post" onsubmit="return confirm('Are you sure you want to submit this reservation?');">
                <div class="inputBox">
                    <div class="input">
                        <h1>Customer Information</h1>
                        <input type="text" name="name" placeholder="Enter Name..." autocomplete="off">
                        <input type="email" name="email" placeholder="Enter Email..." autocomplete="off">
                        <input type="number" name="phone" placeholder="Enter Phone No..." autocomplete="off">
                    </div>
                    <div class="input">
                        <h1>Booking Details</h1>
                        <input type="date" name="date">
                        <input type="time" name="time">
                        <input type="number" name="number" placeholder="How much people?">
                    </div>
                </div>
                <input type="submit" class="btn" name="book" value="Book Now">
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
    <script src="script.js"></script>
</body>
</html>