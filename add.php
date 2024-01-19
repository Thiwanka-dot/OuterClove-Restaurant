<?php
session_start();
require 'connection.php';

function removeProduct($productId) {
    foreach ($_SESSION['cart'] as $key => $cartItem) {
        if ($cartItem['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

if (isset($_POST['addcart'])) {
    $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $quantity = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $product = mysqli_fetch_assoc($result);

            if ($product) {
                if (isset($_SESSION['cart'])) {
                    $isFound = false;

                    foreach ($_SESSION['cart'] as &$cartItem) {
                        if ($cartItem['id'] == $productId) {
                            $cartItem['quantity'] = $quantity;
                            $isFound = true;
                            break;
                        }
                    }

                    if (!$isFound) {
                        $_SESSION['cart'][] = array(
                            'id' => $product['id'],
                            'title' => $product['title'],
                            'price' => $product['price'],
                            'quantity' => $quantity
                        );
                    }
                } else {
                    $_SESSION['cart'] = array(
                        array(
                            'id' => $product['id'],
                            'title' => $product['title'],
                            'price' => $product['price'],
                            'quantity' => $quantity
                        )
                    );
                }
            } else {
                echo "Product not found.";
            }

            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $productId = isset($_POST['productId']) ? (int)$_POST['productId'] : 0;
    removeProduct($productId);
}

if (isset($_POST['delete_all'])) {
    unset($_SESSION['cart']);
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
        <h3>shopping cart</h3>
        <p><a href="index.html">home </a> <span> / cart</span></p>
    </section>
    <section class="products" style="padding-top: 8rem;">
        <div class="box-container">
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $grandTotal = 0;

                foreach ($_SESSION['cart'] as $item) {
                    $totalPrice = $item['price'] * $item['quantity'];
                    $grandTotal += $totalPrice;
            ?>
            <div class="box">
                <h3><?= $item['title']; ?></h3>
                <p>Price: Rs <?= $item['price']; ?></p>
                <p>Quantity: <?= $item['quantity']; ?></p>
                <p>Total: Rs <?= $totalPrice; ?></p>
                <form method="post" action="">
                    <input type="hidden" name="productId" value="<?= $item['id']; ?>">
                    <button type="submit" name="delete" class="btn">Delete</button>
                </form>
            </div>
            <?php
                }
            ?>
            <div class="box">
                <h3>Grand Total</h3>
                <p>Total: Rs <?= $grandTotal; ?></p>
            </div>
            <?php
            }else{
                echo "<h1>Your Cart Is Empty!</h1>";
            }
            ?>
        </div>
        <form method="post" action="">
            <button type="submit" name="delete_all" class="btn">Delete All</button>
        </form>
        <a href="checkout.php" class="btn">Proceed to Checkout</a>
        </div>
    </section>
    <section class="footer">
        <?php include "footer.php" ?>
    </section>    
    <script src="script.js"></script>
</body>
</html>
