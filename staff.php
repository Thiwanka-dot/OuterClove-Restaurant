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
    <div class="container">
        <img src="Images/restaurant.png" alt="logo">
        <h3>Staff Login</h3>
        <form action="" method="post">
            <label for="name">Username:</label><br>
            <input type="text" name="name" placeholder="Enter Username..." autocomplete="off"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" placeholder="Enter Password..." autocomplete="off"><br><br>
            <input type="submit" value="Login" class="submit" name="submit">
        </form>
        <?php
        require 'connection.php';

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            $pw = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";

            if(empty($name) || empty($password)){
                echo "<script>alert('Please Enter User ID And Password!')</script>";
            }
            elseif(!preg_match ("/^[a-zA-Z\s]*$/", $name)){
                echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
            }
            elseif(!preg_match($pw, $password)){
                echo "<script>alert('Password is not strong enough!');</script>";
            }
            else{
                $sql = "SELECT * FROM staff WHERE name = '$name' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    header("Location: staffpanel.php");
                    exit;
                }
                else{
                    echo "<script>alert('Invalid User ID And Password!')</script>";
                };
            }
        }
        ?>
    </div>
</body>
</html>
