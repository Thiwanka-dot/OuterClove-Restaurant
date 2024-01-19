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
    <!--About-->
    <section class="about" id="about" style="padding-top: 8rem;">
        <h3 class="sub-heading"> about us </h3>
        <h1 class="heading"> why choose us? </h1>
        <div class="row">
            <div class="image">
                <img src="Images/staff.jpg" alt="about" style="border-radius: 2rem;">
            </div>
            <div class="content">
                <h3>Best food in the country</h3>
                <p>Outer Clove Restaurant is dedicated to providing an exceptional 
                    dining experience that goes beyond the typical. Outer Clove 
                    exemplifies our dedication to providing a unique culinary experience, 
                    showcasing our love for fine dining through a cozy setting and carefully 
                    chosen menu.
                </p>
                <p>Outer Clove Restaurant, led by seasoned chefs, offers a diverse menu 
                    of fresh, quality ingredients. The restaurant celebrates global cuisine's 
                    richness while focusing on locally sourced, sustainable ingredients. 
                    Each plate tells a story of passion, creativity, and dedication to 
                    providing an exceptional dining experience.
               </p>
               <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>easy payment</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
               </div>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <h3 class="sub-heading"> our services </h3>
        <h1 class="heading"> What do we provide? </h1>
        <div class="row">
            <div class="image">
                <img src="Images/rrr.jpg" alt="about" style="border-radius: 2rem;">
            </div>
            <div class="content">
                <p>Outer Clove Restaurant offers a variety of services to ensure unforgettable 
                    meals, with a dedicated team dedicated to exceptional customer service. 
                    The cozy atmosphere provides an ideal setting for celebrations, lunches, 
                    and evenings. And provided these options for customers to choose which type 
                    of order they need to make...
               </p>
              <div class="icons-container">
               <div class="icons">
                   <span>dine-in</span>
               </div>
               <div class="icons">
                   <span>takeout</span>
               </div>
               <div class="icons">
                   <span>delivery</span>
               </div>
              </div>
                <p>Outer Clove's menu showcases excellence with fresh, delicious 
                    dishes made with the best ingredients. Chefs work tirelessly 
                    to provide an unmatched culinary experience, catering to a wide 
                    range of palates.
                </p>
                <p>We offer exceptional dining experiences with efficient services, 
                    attentive waitstaff, and prompt, courteous service. They 
                    provide menu recommendations, dietary preferences, and reservation 
                    assistance, ensuring a seamless and enjoyable dining experience.
               </p>
               <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-parking"></i>
                    <span>Vehicle Parking</span>
                </div>
                <div class="icons">
                    <i class="fas fa-chair"></i>
                    <span>Table Serving</span>
                </div>
                <div class="icons">
                    <i class="fas fa-icicles"></i>
                    <span>Air Conditioners</span>
                </div>
                <div class="icons">
                    <i class="fa-solid fa-champagne-glasses"></i>
                    <span>Fine Dining</span>
                </div>
               </div>
            </div>
        </div>
    </section>
    <section class="footer">
        <?php include "footer.php" ?>
    </section>
    <script src="script.js"></script>
</body>
</html>