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

if (isset($_POST['delete_reservation'])) {
    $reservationId = isset($_POST['reservation_id']) ? (int)$_POST['reservation_id'] : 0;

    $deleteQuery = "DELETE FROM reservation WHERE id = $reservationId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "<script>alert('Reservation deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete reservation');</script>";
    }
}

$view = "SELECT id, name, email, phone, date, time, number FROM reservation";
$result = mysqli_query($conn, $view);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='border: #000; background-color: #fff; text-align: center;'>";
    echo "<tr>
        <th style='padding: 13px;'>Name</th>
        <th style='padding: 13px;'>Email</th>
        <th style='padding: 13px;'>Phone</th>
        <th style='padding: 13px;'>Date</th>
        <th style='padding: 13px;'>Time</th>
        <th style='padding: 13px;'>No. of People</th>
        <th style='padding: 13px;'>Actions</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td style='padding: 13px;'>" . $row['name'] . "</td>";
        echo "<td style='padding: 13px;'>" . $row['email'] . "</td>";
        echo "<td style='padding: 13px;'>" . $row['phone'] . "</td>";
        echo "<td style='padding: 13px;'>" . $row['date'] . "</td>";
        echo "<td style='padding: 13px;'>" . $row['time'] . "</td>";
        echo "<td style='padding: 13px;'>" . $row['number'] . "</td>";
        echo "<td style='padding: 13px;'>
        <form method='post' action=''>
            <input type='hidden' name='reservation_id' value='" . $row['id'] . "'>
            <button type='submit' name='delete_reservation'>Delete</button>
        </form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>