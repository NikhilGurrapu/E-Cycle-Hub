-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 11:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecyclehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_role`) VALUES
(3, 'admin', 'admin@gmail.com', 'Admin@123', 'tiger.jpg', 'India', '<p>admin</p>', '9977880078', 'Admin'),
(6, 'Nikhil', 'nikhilgurrapu@gmail.com', 'Nikhil@123', 'baby.jpg', 'India', '<p>hgvdghvh jhdvbv hvdhfbb bsndb&nbsp;</p>', '9876543221', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_count`) VALUES
(1, 'Hero Lectro', 19),
(2, 'Bianchi', 1),
(3, 'EMotorad', 2),
(4, 'Firefox', 3),
(5, 'Lectro', 10),
(6, 'Ninety One', 7),
(7, 'Nuze', 9),
(8, 'Pedaleze', 10),
(9, 'Svitch', 1),
(10, 'Traid', 11),
(11, 'WaltX', 3),
(12, 'Heileo', 38),
(13, 'Being Human', 9);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `color_top` varchar(100) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `color_top`) VALUES
(1, 'Red', 'YES'),
(2, 'Blue', 'YES'),
(3, 'Grey', 'YES'),
(4, 'Orange', 'YES'),
(5, 'Silver', 'YES'),
(6, 'Black', 'YES'),
(9, 'Yellow', 'YES'),
(10, 'Green', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(255) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_state` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pincode` varchar(100) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `join_date`, `customer_name`, `customer_lname`, `customer_email`, `customer_pass`, `customer_state`, `customer_city`, `customer_contact`, `customer_address`, `customer_pincode`, `customer_image`, `customer_ip`) VALUES
(1, '2021-12-13', 'Nikhil', 'Gurrapu', 'nikhilgurrapu@gmail.com', 'Getidea@123', 'Maharashtra', 'Mumbai', '9876543210', 'SAI SHARDA GULLY NO-26,KAMARAJ NAGAR, EASTERN EXPRESS HIGHWAY ROAD, GHATKOPAR (EAST), OPP TO B.M.C SCHOOL Mumbai - 400077, Maharashtra', '400009', 'virat.jpg', '::1'),
(19, '2022-03-15', 'Ramana', 'Sudala', 'ramana@gmail.com', 'Ramana@123', 'Maharashtra ', 'mumbai', '9809764576', 'jsjshjshj', '', '122109473_351565432600131_4301472173838241627_n(1).jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `cost_price` int(100) NOT NULL,
  `selling_price` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `final_cost_price` int(200) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `profit` int(100) NOT NULL,
  `invoice_no` text NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_method` text NOT NULL,
  `payment_status` text NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `product_id`, `product_title`, `product_image`, `cost_price`, `selling_price`, `qty`, `final_cost_price`, `due_amount`, `profit`, `invoice_no`, `order_date`, `payment_method`, `payment_status`, `order_status`) VALUES
(1, 1, 7, 'Heileo M100', 'Heileo-M100(16)-1-Green.jpg', 35000, 48900, 1, 35000, 48900, 13900, 'ORD1064383114EHUB', '2022-02-08', 'COD', 'Pending', 'Packing'),
(2, 1, 14, 'Being Human BH12', 'BH12-Black-600x419.jpg', 22500, 38999, 3, 67500, 116997, 49497, 'ORD1064383114EHUB', '2022-01-08', 'COD', 'Pending', 'Canceled'),
(5, 1, 7, 'Heileo M100', 'Heileo-M100(16)-1-Green.jpg', 35000, 48900, 2, 70000, 97800, 27800, 'ORD1995863028EHUB', '2022-03-10', 'COD', 'Pending', 'Canceled'),
(7, 1, 11, 'Heileo H100', 'Heileo-H100(19)-1-White.jpg', 35000, 48900, 2, 70000, 97800, 27800, 'ORD1574440143EHUB', '2022-03-11', 'Razorpay', 'Completed', 'Canceled'),
(8, 1, 7, 'Heileo M100', 'Heileo-M100(16)-1-Green.jpg', 35000, 48900, 1, 35000, 48900, 13900, 'ORD596954543EHUB', '2022-03-15', 'Razorpay', 'Completed', 'Ordered'),
(9, 19, 15, 'HERO LECTRO C3i', 'C3i-1.jpg', 24500, 38999, 1, 24500, 38999, 14499, 'ORD134941529EHUB', '2022-03-15', 'Razorpay', 'Completed', 'Packing'),
(10, 19, 8, 'Heileo M200', 'Heileo-M200(16)-1-Yellow.jpg', 40000, 55900, 1, 40000, 55900, 15900, 'ORD64956365EHUB', '2022-03-15', 'COD', 'Pending', 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_question`, `faq_answer`) VALUES
(2, 'How long will it take for me to receive the Bicycle?', '<p>The delivery time for every bicycle differs according to the location. You can check the delivery time to your location by entering your pin code in our pin code checker. Once the shipment is dispatched we will send you a personalized tracking link for you to track your package.</p>'),
(3, 'In What condition will I get my Bicycle', '<p>All bicycles delivered by us will be fully fitted and ready to ride. In some rare cases, we will send an unassembled bicycle and will send a technician to your house for assembling the bicycle for free.</p>'),
(4, 'I want to buy a bicycle  but I am not able to make my decision on which one to buy.', '<p>Do not worry, we have our dedicated chat support with bicycle experts on our website available to help you make the perfect choice with your bicycle. You can reach out to our Bicycle Experts through our Chat on the bottom right corner of your screen.</p>'),
(5, 'How will I know if the Bicycle will fit me without riding it?', '<p>Our team has done extensive research on sizing charts for all types of bicycles. You can click the Check Size button, enter your height in inches or cms and our system will calculate the right frame size for you.</p>'),
(6, 'Terms for Defects and Returns', '<p>If in the unfortunate circumstance that the product you receive is damaged, contact us at&nbsp;support@ecycleshub.com&nbsp;and we will try and address this issue through our technicians, or assure returns/replacement of defective parts in case of manufacturing defects after checking necessary proof of the damage/defect.</p>'),
(7, 'The payment has gone through but I have not received any confirmation?', '<p>Do not worry, your money is safe. Contact us immediately via&nbsp;support@ecycleshub.com&nbsp;or through our chat option on the website and we will help you with the status of your order.</p>'),
(8, 'Is ecycleshub.com authorized by the brand to sell online?', '<p>Yes, ecycleshub.com only sells Bicycles from Brands that have certified us to sell their products online.</p>'),
(9, 'Is there an option to exchange my Old Bicycle for a New Bicycle?', '<p>We do not have the option of exchanging your Old Bicycle for a new one.</p>'),
(10, 'Can I use an E-Bicycle like a normal Bicycle?', '<p>All E-Bicycles can be ridden like a normal Bicycle. You have to turn off the Electric Assistance and then ride it like a normal cycle.</p>'),
(11, 'Is the battery on E-Bicycles waterproof?', '<p>All external-detachable battery packs on E bicycles are water resistant. They all conform to the IP65 or IP67 international standard for measuring water resistance of a product.</p>'),
(12, 'Does an E-Bicycle require special service?', '<p>No, E-Bicycles do not require any special service or maintenance. Regular cleaning of the bicycle and greasing of the chain are sufficient.</p>'),
(13, 'What is the warranty on E-Bicycles?', '<p>Like normal Bicycles, E-Bicycles also come with a full brand warranty for the frame, fork, battery, motor, and gearing components. Each brand has its own specific warranty terms, which can be read by clicking the Read Brand Warranty button below the Product Overview on the Product Page.</p>'),
(15, 'What is the range on 1 full battery charge?', '<p>The range for 1 full battery charge differs from model to model according to the battery capacity and ride mode. You can check the range of an E-Bicycle in the Tech Specs Section on the product page.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `product_id`, `customer_id`, `product_title`, `product_image`, `qty`, `amount`, `payment_date`, `payment_method`, `payment_status`) VALUES
(1, 'ORD1574440143EHUB', 11, 1, 'Heileo H100', 'Heileo-H100(19)-1-White.jpg', 2, 97800, '2022-03-11 06:48:18', 'Razorpay', 'Completed'),
(2, 'ORD596954543EHUB', 7, 1, 'Heileo M100', 'Heileo-M100(16)-1-Green.jpg', 1, 48900, '2022-03-15 05:37:11', 'Razorpay', 'Completed'),
(3, 'ORD134941529EHUB', 15, 19, 'HERO LECTRO C3i', 'C3i-1.jpg', 1, 38999, '2022-03-15 06:00:57', 'Razorpay', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_img4` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `frame_type` varchar(255) NOT NULL,
  `frame_name` varchar(255) NOT NULL,
  `motor_type` varchar(255) NOT NULL,
  `motor_name` varchar(255) NOT NULL,
  `fork` varchar(255) NOT NULL,
  `suspension` varchar(255) NOT NULL,
  `gear` varchar(255) NOT NULL,
  `mileage_pedal` varchar(255) NOT NULL,
  `mileage_throttle` varchar(255) NOT NULL,
  `rims_type` varchar(255) NOT NULL,
  `rims_name` varchar(255) NOT NULL,
  `tyre_size` varchar(255) NOT NULL,
  `max_speed` int(100) NOT NULL,
  `display` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `brakes` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `battery_life` int(100) NOT NULL,
  `charge_time` int(100) NOT NULL,
  `product_model` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `stock` int(100) NOT NULL,
  `count` int(100) NOT NULL,
  `cost_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `brand_id`, `date`, `product_title`, `product_color`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_price`, `frame_type`, `frame_name`, `motor_type`, `motor_name`, `fork`, `suspension`, `gear`, `mileage_pedal`, `mileage_throttle`, `rims_type`, `rims_name`, `tyre_size`, `max_speed`, `display`, `distance`, `brakes`, `battery`, `battery_life`, `charge_time`, `product_model`, `product_desc`, `product_keywords`, `stock`, `count`, `cost_price`) VALUES
(6, 36, 12, '2022-03-08 15:07:13', 'Heileo M100', 'Orange', 'Heileo-M100(16)-1-Orange.jpg', 'Heileo-M100(16)-2-Orange.jpg', 'Heileo-M100-Display (1).jpg', '', 48900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Spring suspension 60mm travel', '60mm Travel Suspension', '7 Speed', '20', '30-35', 'Alloy', 'Alloy Double Wall', '27\" x 1.95\"', 25, 'LCD', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 4, 'Heileo M100', '<p>Heileo M100 is a stylish, lightweight Mountain style electric bike, that makes city commuting and off-roading incredibly easy and a lot more fun. Designed to stand out, built with Aluminium alloy frame and packed with 345 &amp; 460 watt-hours of power, this machine is to pride on.</p>', 'M100', 0, 23, 35000),
(7, 36, 12, '2022-03-15 05:37:11', 'Heileo M100', 'Green', 'Heileo-M100(16)-1-Green.jpg', 'Heileo-M100(16)-2-Green.jpg', 'Heileo-M100-Display (1).jpg', '', 48900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Spring suspension 60mm travel', '60mm Travel Suspension', '7 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '27\" x 1.95\"', 25, 'LCD', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 4, 'Heileo M100', '<p>Heileo M100 is a stylish, lightweight Mountain style electric bike, that makes city commuting and off-roading incredibly easy and a lot more fun. Designed to stand out, built with Aluminium alloy frame and packed with 345 &amp; 460 watt-hours of power, this machine is to pride on.</p>', 'M100', 5, 16, 35000),
(8, 37, 12, '2022-03-15 06:01:33', 'Heileo M200', 'Yellow', 'Heileo-M200(16)-1-Yellow.jpg', 'Heileo-M200(16)-2-Yellow.jpg', 'Heileo-M200-Display (1).jpg', '', 55900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Spring suspension 60mm travel', 'Full Suspension', '8 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '27\" x 2.10\"', 25, 'TFT Display', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 3, 'Heileo M200', '<p>Heileo M200 is a stylish, performance Mountain style electric bike, that packs a punch be it on flat, steep or rough terrains. It makes city commuting, off-roading and adventure riding incredibly easy and a lot more fun. Designed to stand out, built with Aluminium alloy frame and packed with 345 &amp; 460 watt-hours of power, this mean machine is a prized possession.</p>', 'M200', 0, 12, 40000),
(9, 37, 12, '2022-03-08 15:23:15', 'Heileo M200', 'Blue', 'Heileo-M200(16)-1-Blue.jpg', 'Heileo-M200(16)-2-Blue.jpg', 'Heileo-M200-Display (1).jpg', '', 55900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Spring suspension 60mm travel', 'Full Suspension', '8 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '27\" x 2.10\"', 25, 'TFT Display', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 3, 'Heileo M200', '<p>Heileo M200 is a stylish, performance Mountain style electric bike, that packs a punch be it on flat, steep or rough terrains. It makes city commuting, off-roading and adventure riding incredibly easy and a lot more fun. Designed to stand out, built with Aluminium alloy frame and packed with 345 &amp; 460 watt-hours of power, this mean machine is a prized possession.</p>', 'M200', 7, 19, 40000),
(10, 38, 12, '2022-03-08 15:07:50', 'Heileo H100', 'Green', 'Heileo-H100(19)-1-Green.jpg', 'Heileo-H100(19)-2-Green.jpg', 'Heileo-M100-Display (1).jpg', '', 48900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Rigid Steel Fork', 'Full Suspension', '7 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '700x38C', 25, 'LCD', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 3, 'Heileo H100', '<p>Heileo H100 is a hybrid style electric bike, with stand-out looks and built to make city commuting a breeze. Built with 6061 Aluminium alloy frame, packed with 345 &amp; 460 watt-hours of power, the H100 is elegant, light weight and a classic bicycle to have.</p>', 'H100', 9, 2, 35000),
(11, 38, 12, '2022-03-11 06:48:18', 'Heileo H100', 'Black', 'Heileo-H100(19)-1-White.jpg', 'Heileo-H100(19)-2-White.jpg', 'Heileo-M100-Display (1).jpg', '', 48900, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Rigid Steel Fork', 'Full Suspension', '7 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '700x38C', 25, 'LCD', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 3, 'Heileo H100', '<p>&nbsp;</p>\r\n<p><span id=\"lblBProdDesc\">Heileo H100 is a hybrid-style electric bike, with stand-out looks and built to make city commuting a breeze. Built with 6061 Aluminium alloy frame, packed with 345 &amp; 460 watt-hours of power, the</span><span id=\"lblBProdDesc\"> H10</span><span id=\"lblBProdDesc\">0</span><span id=\"lblBProdDesc\"> is elegant, lightweight and a classic bicycle to have.</span></p>', 'H100', 6, 3, 35000),
(13, 39, 12, '2022-03-08 15:08:04', 'Heileo H200', 'Green', 'Heileo-H200(19)-1-BGreen.jpg', 'Heileo-H200(19)-2-BGreen.jpg', 'Heileo-M200-Display (1).jpg', '', 58897, 'Alloy', '6061 Aluminium Alloy', 'Brushless DC Motor', 'Rear | BLDC Hub Motor', 'Rigid Steel Fork', 'Full Suspension', '8 Speed', 'Select Mileage Pedal', '30-35', 'Alloy', 'Alloy Double Wall', '700x38C', 21, 'TFT Display', 'Upto 35km in one charge', 'Mechanical Disc Brakes', 'Lithium-ion, Detachable', 3, 3, 'Heileo H200', '<p>Heileo H200 is a hybrid style electric bike, sure to turn heads with its unrivalled looks and built to make city commuting a breeze. Built with Aluminium alloy frame with smooth welded joints, packed with 345 &amp; 460 watt-hours of power, this slick machine is the lightest hybrid electric bike in the market, and a prized possession.</p>', 'H200', 10, 8, 45000),
(14, 40, 13, '2022-03-08 15:14:00', 'Being Human BH12', 'Black', 'BH12-Black-600x419.jpg', 'BH12-Black-side-600x419.jpg', '', '', 38999, 'Alloy', ' Alloy (6061) Frame', 'Brushless DC Motor', 'Powerful 36V 250W Shengyi Brushless DC Rear Hub Motor', 'High Tensile Rigid Fork', '60mm Travel Suspension', '7 Speed', 'Up to 50', '30-35', 'Alloy', 'Alloy Double Wall', '27\" x 2.10\"', 25, 'Led Display', 'Upto 25km in one charge', 'Mechanical Disc Brakes', '36V, 6.4Ah Li-Ion (IP67 protection)', 3, 4, 'Being Human BH12', '<p>The cycle is delivered in Semi-Assembled condition (80% assembled). Customer needs to assemble the front tire, handle and pedals before use. The assembly video provided offers a step by step guide through the entire process. Allen Key and Cone wrench provided in the box for installation.</p>', 'BH12', 5, 16, 22500),
(15, 4, 1, '2022-03-15 06:00:57', 'HERO LECTRO C3i', 'Silver', 'C3i-1.jpg', 'C3i-2.jpg', 'C3i-3.jpg', '', 38999, 'Alloy', 'AL Tech 6061 Alloy', 'Brushless DC Motor', 'Powerful 36V 250W Shengyi Brushless DC Rear Hub Motor', 'High Tensile Rigid Fork', 'Front Suspension with Lockout', 'MultiSpeed', '20', '25', 'Alloy', 'Alloy Double Wall', '700 C', 25, 'Led Display', 'Upto 25km in one charge', 'Shimano BR-MT520 Hydraulic Disc Brakes', '36V, 6.4Ah Li-Ion (IP67 protection)', 3, 4, 'HERO LECTRO C3i', '<p>Built with accuracy &amp; engineered with perfection, HERO LECTRO C3 takes you to a whole new level of cycling. These e-cycles are your ultimate travel &amp; outdoor partner that adds zest to your life &amp; mood as you explore whole new level of riding.</p>', 'C3i', 9, 19, 24500),
(17, 41, 1, '2022-03-08 15:08:33', 'HERO LECTRO C9', 'Silver', 'c9-silver.png', 'c9-01.jpg', 'c9-02.jpg', 'c9-03.png', 46999, 'Alloy', 'Alloy 6061 33cm Folding Type', 'Brushless DC Motor', 'Powerful 36V 250W Shengyi Brushless DC Rear Hub Motor', 'Rigid Steel Fork Threadles', '60mm Travel Suspension', '7 Speed', '40', '30', 'Alloy', 'Alloy Double Wall', '4.0cm-50.7cm (20\"x1.75\")', 25, 'Led Display', 'Upto 40km range', 'Mechanical Disc Brakes', 'BATTERY R/CARR 36vx 8.7ah BAK CELL -BK', 3, 4, 'HERO LECTRO C9', '<p>Unfold the urban way of riding with our new folding bike C9. Fold it compactly to carry in your car or public transport, even indoors for charging. Easy to store, easy to transport, easier to fold!</p>', 'C9', 0, 15, 32500);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  `p_cat_top` varchar(10) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`, `p_cat_top`) VALUES
(3, 'HERO LECTRO C3', 'Built with accuracy & engineered with perfection, HERO LECTRO C3 takes you to a whole new level of cycling. These e-cycles are your ultimate travel & outdoor partner that adds zest to your life & mood as you explore a whole new level of riding.', 'YES'),
(4, 'HERO LECTRO C3i', 'Built with accuracy & engineered with perfection, HERO LECTRO C3i takes you to a whole new level of cycling. These e-cycles are your ultimate travel & outdoor partner that adds zest to your life & mood as you explore a whole new level of riding.', 'YES'),
(7, 'HERO LECTRO C3-Small', 'Built with accuracy & engineered with perfection, HERO LECTRO C3-Small takes you to a whole new level of cycling. These e-cycles are your ultimate travel & outdoor partner that adds zest to your life & mood as you explore a whole new level of riding.', 'YES'),
(8, 'HERO LECTRO C4', 'Built with accuracy & engineered with perfection, HERO LECTRO C4 takes you to a whole new level of cycling. These e-cycles are your ultimate travel & outdoor partner that adds zest to your life & mood as you explore a whole new level of riding.', 'YES'),
(9, 'HERO LECTRO C5', 'A perfect combination of power & comfort, HERO LECTRO C5 will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(10, 'HERO LECTRO C5E', 'A perfect combination of power & comfort, HERO LECTRO C5E will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(11, 'HERO LECTRO C5i', 'A perfect combination of power & comfort, HERO LECTRO C5i will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(12, 'HERO LECTRO C5iE', 'A perfect combination of power & comfort, HERO LECTRO C5iE will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(13, 'HERO LECTRO C5V', 'A perfect combination of power & comfort, HERO LECTRO C5V will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(14, 'HERO LECTRO C6E', 'A perfect combination of power & comfort, HERO LECTRO C6E will give you an experience, which you won’t trade with anything else. Designed with perfection & technical prowess, these e-cycles are your best-commuting partners & best to energize your body, mind & soul.', 'YES'),
(35, 'Firefox Adventron 27.5', '<p>Firefox is an Indian Bicycle Company who took the market by storm in 2005 with their range of imported bicycles.</p>', 'YES'),
(36, 'M100', '<p>Electric Mountain Bike, Aluminium Alloy Frame, 60/80 Kms range on Pedal Assist, 7-Speed Gears, 5-Level Power Assist, LCD Display, Detachable Li-ion Battery, Dual Disk Brakes</p>', 'YES'),
(37, 'M200', '<p>Performance Electric Mountain Bike, Aluminium Alloy Frame, 60/80 Kms range on Pedal Assist, 8-Speed Cassette, 8-Level Power Assist, TFT Display, Detachable Li-ion Battery, Dual Disk Brakes</p>', 'YES'),
(38, 'H100', '<p>Electric Hybrid Bike, Aluminium Alloy Frame, 60/80 Kms range on Pedal Assist, 7-Speed Gears, 5-Level Power Assist, LCD Display, Detachable Li-ion Battery, Dual Disk Brakes</p>', 'YES'),
(39, 'H200', '<p>Electric Hybrid Bike, Aluminium Alloy Frame, 60/80 Kms range on Pedal Assist, 7-Speed Gears, 5-Level Power Assist, LCD Display, Detachable Li-ion Battery, Dual Disk Brakes</p>', 'YES'),
(40, 'BH12', '<p>The cycle is delivered in Semi-Assembled condition (80% assembled). Customer needs to assemble the front tire, handle and pedals before use. The assembly video provided offers a step by step guide through the entire process.&nbsp;</p>', 'YES'),
(41, 'HERO LECTRO C9', '<p>Built with accuracy &amp; engineered with perfection, HERO LECTRO C9 takes you to a whole new level of cycling. These e-cycles are your ultimate travel &amp; outdoor partner that adds zest to your life &amp; mood as you explore a whole new level of riding.</p>', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(10, 'Slide Number 1', 'banner-2.jpg'),
(11, 'Slide Number 2', 'banner-3.png'),
(12, 'slide number 3', 'banner-1.jpg'),
(13, 'slide number 4', 'banner-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `spec`
--

CREATE TABLE `spec` (
  `spec_id` int(11) NOT NULL,
  `spec_name` varchar(255) NOT NULL,
  `spec_type` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spec`
--

INSERT INTO `spec` (`spec_id`, `spec_name`, `spec_type`, `spec`) VALUES
(2, 'AL Tech 6061 Alloy', 'Alloy', 'Frame'),
(3, ' Alloy (6061) Frame', 'Alloy', 'Frame'),
(4, 'Aria E-Road Disc Carbon', 'Carbon', 'Frame'),
(5, 'Bianchi E-SUV Full Carbon', 'Carbon', 'Frame'),
(6, 'Ultra High Tensile Steel', 'Steel', 'Frame'),
(9, 'Powerful 36V 250W Shengyi Brushless DC Rear Hub Motor', 'Brushless DC Motor', 'Motor'),
(10, 'High Tensile Rigid Fork', 'Fork', 'Fork'),
(11, '60mm Travel Suspension', 'Suspension', 'Fork'),
(12, 'Single Speed', 'Gear', 'Gear'),
(13, '7 Speed', 'Gear', 'Gear'),
(14, '8 Speed', 'Gear', 'Gear'),
(15, '9 Speed', 'Gear', 'Gear'),
(16, '10 Speed', 'Gear', 'Gear'),
(17, '11 Speed', 'Gear', 'Gear'),
(18, '12 Speed', 'Gear', 'Gear'),
(19, '21 Speed', 'Gear', 'Gear'),
(20, '22 Speed', 'Gear', 'Gear'),
(22, '36V, 6.4Ah Li-Ion (IP67 protection)', 'Battery', 'Battery'),
(23, '10.4Ah Li-Ion', 'Battery', 'Battery'),
(27, 'Alloy Double Wall', 'Alloy', 'Rims'),
(35, 'MCFK Carbon Rim MTB 29er 25mm 28H k Matte', 'Carbon', 'Rims'),
(36, '45RB Black Steel Rims', 'Steel', 'Rims'),
(37, 'Shimano BR-MT520 Hydraulic Disc Brakes', 'Brakes', 'Brakes'),
(38, 'Mechanical Disc Brakes', 'Brakes', 'Brakes'),
(39, 'Repute Mechanical Disc Brakes with 160mm Rotors', 'Brakes', 'Brakes'),
(40, 'E8000 Cycle Computer', 'Display', 'Display'),
(41, 'Led Display', 'Display', 'Display'),
(43, '20', 'Tyre', 'Tyre'),
(44, '26', 'Tyre', 'Tyre'),
(45, 'Upto 25km in one charge', 'Distance', 'Distance'),
(46, 'Upto 35km in one charge', 'Distance', 'Distance'),
(47, 'Upto 50km in one charge', 'Distance', 'Distance'),
(48, '20', 'Mileage Pedal', 'Mileage Pedal'),
(49, '25', 'Mileage Throttle', 'Mileage Throttle'),
(50, 'Front Suspension', 'Suspension', 'Fork'),
(51, 'Full Suspension', 'Suspension', 'Fork'),
(52, 'Front Suspension with Lockout', 'Suspension', 'Fork'),
(53, 'Rigid', 'Suspension', 'Fork'),
(54, 'MultiSpeed', 'Gear', 'Gear'),
(55, '27.5', 'Tyre', 'Tyre'),
(56, '29', 'Tyre', 'Tyre'),
(57, '700 C', 'Tyre', 'Tyre'),
(58, 'Hardtail MTB', 'Alloy', 'Frame'),
(59, 'Rear Hub Motor', 'HUB Motor', 'Motor'),
(60, 'Suntour XCT 100mm travel', 'Fork', 'Fork'),
(61, 'Up to 50', 'Mileage Pedal', 'Mileage Pedal'),
(62, '30-35', 'Mileage Throttle', 'Mileage Throttle'),
(63, 'Tektro M300 Mechanical Disc Brakes', 'Brakes', 'Brakes'),
(64, 'LCD', 'Display', 'Display'),
(65, '6061 Aluminium Alloy', 'Alloy', 'Frame'),
(66, 'Spring suspension 60mm travel', 'Fork', 'Fork'),
(67, 'Lithium-ion, Detachable', 'Battery', 'Battery'),
(68, 'Rear | BLDC Hub Motor', 'Brushless DC Motor', 'Motor'),
(69, '27\" x 1.95\"', 'Tyre', 'Tyre'),
(70, '600MM', 'Tyre', 'Tyre'),
(71, 'TFT Display', 'Display', 'Display'),
(72, '27\" x 2.10\"', 'Tyre', 'Tyre'),
(73, 'Rigid Steel Fork', 'Fork', 'Fork'),
(74, '700x38C', 'Tyre', 'Tyre'),
(75, '630MM', 'Tyre', 'Tyre'),
(76, '8.7Ah Detachable battery', 'Battery', 'Battery'),
(77, 'Upto 40km range', 'Distance', 'Distance'),
(78, 'Alloy 6061 33cm Folding Type', 'Alloy', 'Frame'),
(79, 'Rigid Steel Fork Threadles', 'Fork', 'Fork'),
(80, '4.0cm-50.7cm (20\"x1.75“)', 'Tyre', 'Tyre'),
(81, 'BATTERY R/CARR 36vx 8.7ah BAK CELL -BK', 'Battery', 'Battery'),
(82, '40', 'Mileage Pedal', 'Mileage Pedal'),
(83, '30', 'Mileage Throttle', 'Mileage Throttle');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `term_title` varchar(255) NOT NULL,
  `term_para` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `date`, `term_title`, `term_para`) VALUES
(5, '2022-02-18 12:11:10', 'Terms & Conditions', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure accusamus numquam distinctio aspernatur esse dignissimos quasi sequi rerum, iusto pariatur voluptatem. Modi quas, maiores eius reprehenderit facilis esse provident praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure accusamus numuam distinctio aspernatur esse dignissimos quasi sequi rerum, iusto pariatur voluptatem. Modi quas, maiores eius reprehenderit facilis esse provident praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure accusamus numquam distinctio aspernatur esse dignissimos quasi sequi rerum, iusto pariatur voluptatem. Modi quas, maiores eius reprehenderit facilis esse provident praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure accusamus numquam distinctio aspernatur esse dignissimos quasi sequi rerum, iusto pariatur voluptatem. Modi quas, maiores eius reprehenderit facilis esse provident praesentium?</p>'),
(7, '2022-02-18 13:55:19', 'Refund Policy', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>'),
(8, '2022-02-18 13:57:23', 'Promo & Other Terms', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt, sint nemo eos recusandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.sandae, incidunt, ad neque doloremque illum nam omnis magni molestiae accusamus sunt id aspernatur repellendus! Explicabo, modi illo.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spec`
--
ALTER TABLE `spec`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
