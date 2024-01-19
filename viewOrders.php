<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="Images/restaurant.png">
    <title>Outer Clove Restaurant - View Products</title>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <!--Google Font - Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Work+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    require 'connection.php';

    $view = "SELECT title, price, quantity, total, alltotal, name, phone, address, payment FROM orders";
    $result = mysqli_query($conn, $view);

    if(mysqli_num_rows($result) > 0){
        echo "<table border='1' style='border: #000; background-color: #fff; text-align: center;'>";
        echo "<tr>
            <th style='padding: 13px;'>Food Item</th>
            <th style='padding: 13px;'>Price</th>
            <th style='padding: 13px;'>Quantity</th>
            <th style='padding: 13px;'>Total</th>
            <th style='padding: 13px;'>Full Total</th>
            <th style='padding: 13px;'>Name</th>
            <th style='padding: 13px;'>Price</th>
            <th style='padding: 13px;'>Address</th>
            <th style='padding: 13px;'>Payment</th>
            </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='padding: 13px;'>" . $row['title'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['price'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['quantity'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['total'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['alltotal'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['name'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['phone'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['address'] . "</td>";
            echo "<td style='padding: 13px;'>" . $row['payment'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }
    mysqli_close($conn);
    ?>
</body>
</html>