<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Images/restaurant.png">
    <title>Outer Clove Restaurant</title>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <!--Google Font - Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Work+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
    require 'connection.php';

    if (isset($_POST['submit'])) {
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $pattern = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $pw = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";
        $ad = "/^(\\d{1,}) [a-zA-Z0-9\\s]+(\\,)? [a-zA-Z]+(\\,)? [A-Z]{2} [0-9]{5,6}$/";

        if(empty($uid) || empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)){
            echo "<script>alert('Please fill all the fields!')</script>";
        }
        elseif (!preg_match ("/^[0-9]*$/", $uid)){  
            echo "<script>alert('Only numeric value is allowed!');</script>";
        }
        elseif(!preg_match ("/^[a-zA-Z\s]*$/", $name)){
            echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
        }
        elseif(!preg_match ($pattern, $email)){  
            echo "<script>alert('Invalid Email Format!');</script>";
        }
        elseif(!preg_match($pw, $password)){
            echo "<script>alert('Password is not strong enough!');</script>";
        }
        elseif (!preg_match ("/^[0-9]*$/", $phone)){  
            echo "<script>alert('Only numeric value is allowed!');</script>";
        }
        elseif(!preg_match ($ad, $address)){
            echo "<script>alert('Enter an accurate address!');</script>";
        }
        else{
            $sql = "INSERT INTO customers (uid, name, email, password, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssssis", $uid, $name, $email, $password, $phone, $address);
            $result = mysqli_stmt_execute($stmt);

            if (!$result) {
                die('Could not enter data: ' . mysqli_error($conn));
            } else {
                echo "<script>alert('Entered Data Successfully!')</script>";
                header('Location: userprofile.php');
                exit;
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
    ?>
        <img src="Images/restaurant.png" alt="logo">
        <h3>register form</h3>
        <form action="register.php" method="post">
            <label for="uid">User ID:</label><br>
            <input type="text" id="uid" placeholder="Enter ID..." name="uid" autocomplete="off"><br><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" placeholder="Enter Name..." name="name" autocomplete="off"><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" placeholder="Enter Email..." name="email" autocomplete="off"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" placeholder="Enter Password..." name="password" autocomplete="off"><br><br>
            <label for="phone">Number:</label><br>
            <input type="number" id="phone" placeholder="Enter Phone No..." name="phone" autocomplete="off"><br><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" placeholder="Street Name, City, State ZIP code..." name="address" autocomplete="off"><br><br>
            <input type="submit" value="Register" class="submit" name="submit">
            <p>already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>