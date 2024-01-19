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
    <section class="menu" id="menu" style="padding-top: 8rem;">
        <h3 class="sub-heading"> our menu </h3>
        <h1 class="heading"> today's offers </h1>
        <div class="search">
            <input type="text" id="searchBox" placeholder="Search for dishes...">
            <select id="filterDropdown">
                <option value="all">All</option>
                <?php
                $query = "SELECT status FROM filter";
                $tr = mysqli_query($conn, $query);
                if(mysqli_num_rows($tr) > 0){
                    foreach($tr as $tr){
                ?>
                <option value="<?= $tr['status'];?>"><?= $tr['status'];?></option>
                <?php
                    }
                }else{
                    echo "<h1>No Food Found Yet!</h1>";
                }
                ?>
            </select>
            <button onclick="search()" class="fas fa-search"></button>
        </div>
        <div class="box-container">
        <?php
            $sql = "SELECT id, image, title, price, description, filter FROM products";
            $result = mysqli_query($conn, $sql);
            $filters = array();

            while($row = mysqli_fetch_assoc($result)){
                $filters[] = $row['filter'];
            ?>
            <form class="box <?= $row['filter'];?>" method="post" action="add.php?id=<?= $row['id']; ?>">
                <img src="Images/<?= $row['image']; ?>" alt="dish-1" style="height: 30rem; width: 100%; 
                padding: 1.5rem; overflow: hidden; position: relative; object-fit: cover;">
                <div class="content">
                    <h3><?= $row['title']; ?></h3>
                    <p><?= $row['description'];?></p>
                    <span style="font-size: 1.8rem; color: var(--black);" class="price">Rs: <?= $row['price']; ?></span>
                    <input type="submit" class="btn" name="addcart" value="add to cart">
                    <input type="number" name="qty" class="qty" min="1" max="99" value="1">
                </div>
            </form>
            <?php
            }
            ?>   
        </div>
    </section>
    <?php include "footer.php" ?>
    <script src="script.js"></script>
</body>
</html>