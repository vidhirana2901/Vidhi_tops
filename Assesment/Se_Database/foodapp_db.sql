-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2026 at 02:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodapp_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `place_order` (IN `p_customer_id` INT, IN `p_restaurant_id` INT, IN `p_amount` DECIMAL(10,2))   BEGIN
    DECLARE v_balance DECIMAL(10,2);

    START TRANSACTION;

    SELECT wallet_balance
    INTO v_balance
    FROM customers
    WHERE customer_id = p_customer_id;

    IF v_balance >= p_amount THEN

        UPDATE customers
        SET wallet_balance = wallet_balance - p_amount
        WHERE customer_id = p_customer_id;

        INSERT INTO orders
        (restaurant_id, customer_name, total_amount, order_date)
        SELECT
            p_restaurant_id,
            customer_name,
            p_amount,
            CURDATE()
        FROM customers
        WHERE customer_id = p_customer_id;

        COMMIT;

        SELECT 'Order placed successfully' AS message;

    ELSE

        ROLLBACK;

        SELECT 'Insufficient wallet balance' AS message;

    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `wallet_balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `wallet_balance`) VALUES
(1, 'Rahul', 4000.00),
(2, 'Priya', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `item_id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`item_id`, `restaurant_id`, `item_name`, `price`, `category`) VALUES
(1, 1, 'Paneer Tikka', 250.00, 'Starter'),
(2, 1, 'Butter Naan', 80.00, 'Bread'),
(3, 1, 'Veg Thali', 300.00, 'Main Course'),
(4, 2, 'Margherita Pizza', 350.00, 'Pizza'),
(5, 2, 'Farmhouse Pizza', 450.00, 'Pizza'),
(6, 2, 'Garlic Bread', 180.00, 'Starter'),
(7, 3, 'Butter Chicken', 450.00, 'Main Course'),
(8, 3, 'Biryani', 350.00, 'Rice'),
(9, 3, 'Tandoori Chicken', 500.00, 'Starter'),
(10, 4, 'Veg Burger', 180.00, 'Burger'),
(11, 4, 'French Fries', 120.00, 'Starter'),
(12, 4, 'Cold Coffee', 150.00, 'Beverage');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `restaurant_id`, `customer_name`, `total_amount`, `order_date`) VALUES
(1, 1, 'Rahul', 1200.00, '2026-09-01'),
(2, 1, 'Priya', 1800.00, '2026-09-02'),
(3, 1, 'Amit', 1500.00, '2026-09-03'),
(4, 2, 'Neha', 2200.00, '2026-09-04'),
(5, 2, 'Riya', 1900.00, '2026-09-05'),
(6, 2, 'Karan', 1600.00, '2026-09-06'),
(7, 3, 'Vishal', 2500.00, '2026-09-07'),
(8, 3, 'Meera', 2100.00, '2026-09-08'),
(9, 3, 'Arjun', 1800.00, '2026-09-09'),
(10, 4, 'Pooja', 1400.00, '2026-09-10'),
(11, 4, 'Jay', 1700.00, '2026-09-11'),
(12, 4, 'Kavya', 2000.00, '2026-09-12'),
(13, 1, 'Rahul', 1000.00, '2026-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `cuisine_type` varchar(50) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `name`, `city`, `cuisine_type`, `rating`) VALUES
(1, 'Spice Garden', 'Ahmedabad', 'Indian', 4.7),
(2, 'Pizza House', 'Mumbai', 'Italian', 4.2),
(3, 'Royal Kitchen', 'Delhi', 'North Indian', 4.7),
(4, 'Tasty Bites', 'Ahmedabad', 'Fast Food', 4.0),
(5, 'Green Leaf', 'Mumbai', 'Vegetarian', 4.3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `restaurant_menu_summary`
-- (See below for the actual view)
--
CREATE TABLE `restaurant_menu_summary` (
`restaurant_name` varchar(100)
,`total_menu_items` bigint(21)
,`average_item_price` decimal(14,6)
);

-- --------------------------------------------------------

--
-- Structure for view `restaurant_menu_summary`
--
DROP TABLE IF EXISTS `restaurant_menu_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `restaurant_menu_summary`  AS SELECT `r`.`name` AS `restaurant_name`, count(`m`.`item_id`) AS `total_menu_items`, avg(`m`.`price`) AS `average_item_price` FROM (`restaurants` `r` left join `menu_items` `m` on(`r`.`restaurant_id` = `m`.`restaurant_id`)) GROUP BY `r`.`restaurant_id`, `r`.`name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
