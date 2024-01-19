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
        <img src="Images/restaurant.png" alt="logo">
        <h3>Login Form</h3>
        <form action="" method="post">
            <label for="email">User ID:</label><br>
            <input type="text" id="uid" placeholder="Enter ID..." name="uid" autocomplete="off"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" placeholder="Enter Password..." name="password" autocomplete="off"><br><br>
            <input type="submit" value="Login" class="submit" name="submit">
            <p>don't have an account? <a href="register.php">Register Now</a></p>
        </form>
        <?php
        require 'connection.php';
        session_start();

        if(isset($_POST['submit'])){
            $uid = mysqli_real_escape_string($conn, $_POST['uid']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $pw = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";

            if(empty($uid) || empty($password)){
                echo "<script>alert('Please Enter User ID And Password!');</script>";
            }
            elseif (!preg_match ("/^[0-9]*$/", $uid)){  
                echo "<script>alert('Only numeric value is allowed!');</script>";
            }
            elseif(!preg_match($pw, $password)){
                echo "<script>alert('Password is not strong enough!');</script>";
            }
            else{
                $sql = "SELECT * FROM customers WHERE uid = '$uid' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['uid'] = $row['id'];
                    header("Location: userprofile.php");
                }
                else{
                    echo "<script>alert('Invalid User ID And Password!')</script>";
                };
            }
        }
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>