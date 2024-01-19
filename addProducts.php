<?php 
    require 'connection.php';

    if(isset($_POST['submit'])){
        $file = $_FILES['image']['name'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $filter = $_POST['filter'];

        if(empty($file) || empty($title) || empty($description) || empty($price) || empty($filter)){
            echo "<script>alert('Please fill all the fields!')</script>";
        }
        elseif (!preg_match("/^[a-zA-Z\s]*$/", $title)) {
            echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
        }
        elseif (!preg_match ("/^[0-9]*$/", $price)){  
            echo "<script>alert('Only numeric value is allowed!');</script>";
        }
        elseif(!preg_match ("/^[a-zA-Z\s]*$/", $filter)){
            echo "<script>alert('Only alphabets and whitespace are allowed!');</script>";
        }
        else{
            $query = "INSERT INTO products(image, title, description, price, filter) VALUES('$file', '$title', '$description', '$price', '$filter')";
            $result = mysqli_query($conn, $query);

            if($result){
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
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
    <link rel="stylesheet" href="admin.css">
    <!--Google Font - Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Work+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="div">
        <h1>Add Products</h1>
        <form action="addProducts.php" method="post" enctype="multipart/form-data" class="products">
            <label for="image">Upload Image:</label><br>
            <input type="file" name="image" accept=" .jpg, .jpeg, .png"><br><br>
            <label for="title">Title:</label><br>
            <input type="text" name="title" autocomplete="off"><br><br>
            <label for="description">Description:</label><br>
            <input type="text" name="description" autocomplete="off"><br><br>
            <label for="price">Price:</label><br>
            <input type="number" name="price" autocomplete="off"><br><br>
            <label for="filter">Filter Option (Meals, Drinks, Desserts):</label><br>
            <input type="text" name="filter" autocomplete="off"><br><br>
            <input type="submit" value="Submit" name="submit" class="btn">
            <div class="buttons">
                <button class="btn"><a href="adminpanel.php">HOME</a></button>
                <button class="btn"><a href="viewProducts.php">VIEW</a></button>
            </div> 
        </form>
    </div>
</body>
</html>
