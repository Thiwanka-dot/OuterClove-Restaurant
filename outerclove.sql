-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2023 at 02:46 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outerclove`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Admin', 'AdmIn12/#');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `name` char(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=899 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`uid`, `name`, `email`, `password`, `phone`, `address`) VALUES
(121, 'Deshan', 'DeshAn222/#', 'DeshanDul21/', 333546243, '233 Lake View St, Kandy, CP 20345'),
(223, 'Ala', 'AlaPer22@gmail.com', 'AlA12P/#', 884744398, '456 Mountain Ave, Galle, SP 67890'),
(332, 'Sean', 'Sean@gmail.com', 'SeAn231/#', 663432562, '333 Maple St, Ratnapura, SP 22316'),
(488, 'Alex', 'AlexJ@gmail.com', 'AlEx123/#', 113225467, '239 Harbor Blvd, Mannar, NP 34512'),
(777, 'Joseph', 'JosephM@gmail.com', 'JosePh12/#', 334009045, '123 Forest View St, Kurunegala, NW 12345'),
(898, 'Moley Jake', 'Moley@gmail.com', 'MolEy12/#', 888223743, '456 Oak Ave, Townsville, NY 54321'),
(707, 'Colk Don', 'Code12@gmail.com', 'CoDe12/#', 114355265, '789 Pine Rd, Villagetown, TX 98765'),
(232, 'Kreg Moore', 'KregM1@gmail.com', 'KrEge12/#', 665095209, '123 Palm St, Colombo, WP 12345');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

DROP TABLE IF EXISTS `filter`;
CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `status`) VALUES
(1, 'Meals'),
(2, 'Drinks'),
(3, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(200) NOT NULL,
  `alltotal` int(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `payment` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `title`, `price`, `quantity`, `total`, `alltotal`, `name`, `phone`, `address`, `payment`) VALUES
(1, 'Spicy Fried Rice', 2800, 3, 8400, 8400, 'Josh', 888334274, '123 Main St, Cityville, CA 12345', 'Cash'),
(2, 'Veg Pizza', 1600, 2, 3200, 11600, 'Josh', 888334274, '123 Main St, Cityville, CA 12345', 'Cash'),
(3, 'Spicy Fried Rice', 2800, 1, 2800, 2800, 'Haley Kreg', 664455409, '123 River Side St, Batticaloa, EP 12345', 'Cash'),
(4, 'Meaty Cheese Burger', 1500, 3, 4500, 7300, 'Haley Kreg', 664455409, '123 River Side St, Batticaloa, EP 12345', 'Cash'),
(5, 'Veg Pizza', 1600, 1, 1600, 8900, 'Haley Kreg', 664455409, '123 River Side St, Batticaloa, EP 12345', 'Cash'),
(6, 'Plain Cheese Pizza', 1500, 2, 3000, 11900, 'Haley Kreg', 664455409, '123 River Side St, Batticaloa, EP 12345', 'Cash'),
(7, 'Blue Mojito Drink', 2000, 2, 4000, 4000, 'Donald Jack', 443390995, '231 Maple St, Ratnapura, SP 23451', 'Credit'),
(8, 'Mixed Fired Rice', 1200, 1, 1200, 5200, 'Donald Jack', 443390995, '231 Maple St, Ratnapura, SP 23451', 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(200) NOT NULL,
  `filter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `description`, `price`, `filter`) VALUES
(1, 'Drink-2.jpg', 'Soft Orange Drink', 'It is a refreshing, citrusy beverage with a smooth texture, bursting with the vibrant flavor of ripe oranges, perfect for sunny days or fruity refreshments.', 6300, 'Drinks'),
(2, 'Burger-1.png', 'Chicken Cheese Burger', 'It is a savory and indulgent burger featuring grilled chicken and melted cheese, served on a soft, toasted bun. It offers a perfect blend of flavors, catering to both chicken and cheese enthusiasts.', 1500, 'Meals'),
(3, 'Fried-Rice-2.jpg', 'Spicy Fried Rice', 'It is a fiery dish featuring cooked rice, vegetables, meat, and spices. Its served hot, with flavors like chilli, garlic, and soy sauce, ensuring a satisfying and flavorful meal.', 2800, 'Meals'),
(4, 'Pizza-1.jpg', 'Plain Cheese Pizza', 'It is a classic favorite with melty mozzarella and rich tomato sauce, providing a savory experience and a timeless choice for pizza perfection enthusiasts.', 1500, 'Meals'),
(5, 'Pizza-3.jpg', 'Veggie Pizza', 'A delicious veggie pizza with a crispy crust and colourful toppings like bell peppers, tomatoes, onions, olives, and melted mozzarella cheese is perfect for both pizza enthusiasts and vegetarians.', 1600, 'Meals'),
(6, 'Burger-2.png', 'Meaty Cheese Burger', 'It is a savoury culinary masterpiece, featuring seasoned beef patties, melted cheese, and fresh lettuce and tomatoes. Nestled in a soft bun, its a hearty, satisfying, and undeniably delicious experience.', 1500, 'Meals'),
(7, 'Burger-3.jpg', 'BBQ Burger', 'It is a culinary masterpiece that combines flame-grilled perfection with barbecue smokiness. It features seasoned beef patties, smoky sauce, cheddar cheese, lettuce, tomatoes, and pickles on a toasted golden bun, delivering a savory delight.', 1800, 'Meals'),
(8, '668993-2732da66d81c42889fa501957c522f41.jpg', 'Strawberry Cake', 'It is a delightful treat filled with fresh strawberries, vanilla cake, and strawberry cream frosting, perfect for strawberry lovers and sweet tooth enthusiasts.', 2000, 'Desserts'),
(9, 'summer-desserts.jpg', 'Strawberry Short Cake', 'It is a delectable dessert layered with fluffy shortcake, ripe strawberries, and whipped cream, creating a delightful balance of freshness, sweetness, and creaminess, making it a timeless favorite.', 1500, 'Desserts'),
(10, '1357271962606.jpeg', 'Vanilla Chocolate Cake', 'It is a delectable treat, combining moist vanilla sponge with velvety chocolate ganache, offering a heavenly experience that satisfies sweet cravings and leaves a lasting bliss.', 1400, 'Desserts'),
(11, 'Drink-1.jpg', 'Fruit Drink', 'It is a refreshing, handpicked beverage bursting with natural sweetness, perfect for a revitalizing break and a healthy alternative to your beverage cravings.', 1500, 'Drinks'),
(12, 'blue-mojito-curacao-cocktail-featured.jpg', 'Blue Mojito Drink', 'It is a refreshing blend of lime, mint, and blue curacao, creating a tropical paradise experience. Garnished with mint and served over ice, its a refreshing and visually stunning drink.', 2000, 'Drinks'),
(13, 'mineral-water-.jpg', 'Water', 'It is a refreshing, clean, and revitalizing beverage that is essential for life and can be enjoyed at any temperature, providing hydration and a timeless choice.', 250, 'Drinks'),
(14, 'Mixed-Fried-Rice-1.jpg', 'Mixed Fired Rice', 'It is a delectable blend of jasmine rice, vegetables, chicken, and shrimp, seasoned with aromatic spices and soy sauce, offering a delightful journey through textures and tastes, making it a satisfying and savory treat.', 1200, 'Meals');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `number` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone`, `date`, `time`, `number`) VALUES
(2, 'John Doe', 'DoeJ12@gmail.com', 334425467, '2024-01-27', '10:06:00.000000', 5),
(3, 'Mark Greg', 'MarkG33@gmail.com', 889598654, '2024-01-12', '09:06:00.000000', 3),
(4, 'Donald Trump', 'DonaldTr@gmail.com', 888769556, '2024-01-14', '11:12:00.000000', 6),
(5, 'Jason Michel', 'JasonM@gmail.com', 221342586, '2024-01-19', '13:18:00.000000', 2),
(6, 'Chanula Koshwinna', 'Chulle21@gmail.com', 998735278, '2024-01-19', '12:19:00.000000', 3),
(7, 'Joe Bidena', 'JoeBi@gmail.com', 445637987, '2024-01-20', '20:22:00.000000', 4),
(8, 'Lahan Mindinu', 'Lalani08@gmail.com', 998895467, '2024-01-21', '11:30:00.000000', 7),
(9, 'Pasan Nirman', 'PasanN1@gmail.com', 333420908, '2023-12-29', '16:43:00.000000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `password`) VALUES
(1, 'Jessy Gordon', 'JesGor12/#'),
(2, 'Mike Tyson', 'MikTy12/#'),
(3, 'Glory Pearl', 'GloPea33/#');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
