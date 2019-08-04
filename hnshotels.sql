-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 08:27 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnshotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `addons` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`sno`, `name`, `pcode`, `addons`) VALUES
(0, '-1', 'sub11', '["Multi-Grain Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Premium Veggie}",{"comments":""}]'),
(0, '-1', 'sub11', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","Bar-be-que Sauce","{UPSUB :Premium Veggie}",{"comments":""}]'),
(0, '-1', 'sub13', '["Multi-Grain Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Double Meat}",{"comments":""}]'),
(0, '-1', 'sub11', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Egg}",{"comments":""}]'),
(0, '-1', 'sub15', '["Multi-Grain Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Double Meat}",{"comments":""}]'),
(0, '-1', 'sub16', '["Multi-Grain Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :No extra veggies or meat}",{"comments":""}]'),
(0, '-1', 'sub12', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Double Meat}",{"comments":""}]'),
(0, 'Ram Vinoth', 'sub11', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","Tomato","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Double Meat}",{"comments":""}]'),
(0, 'Ram Vinoth', 'sub11', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","Sweet Onion Sauce","{UPSUB :Egg}",{"comments":""}]'),
(0, '-1', 'sub11', '["Italian Bread","Cheese","Salt and Pepper","Toasted","Tomato","All Veggies","Mayonnaise Sauce","Mustard Sauce",{"comments":""}]'),
(0, '-1', 'sub11', '["Hearty Italian Bread","Cheese","Salt and Pepper","Toasted","All Veggies","Mayonnaise Sauce","Mustard Sauce","{UPSUB :Premium Veggie}",{"comments":"k"}]'),
(0, '', 'pc04', '["9","sadasd\nasd\nasd",{"comments":"sadasd\nasd\nasd"}]'),
(0, '', 'pc03', '["9","asd\nasdasd\nasd",{"comments":"asd\nasdasd\nasd"}]'),
(0, '', 'zu01', '["9","Test 123",{"comments":"Test 123"}]'),
(0, 'Surya', 'pc01', '["9 inch","Comments : asdfdas"]'),
(0, 'Surya', 'd01', '["undefined inch","Comments : sfcgs"]'),
(0, 'Surya', 'pc01', '["12 inch","Comments : Test 123\nfdsfsdf"]'),
(0, 'Surya', 'pc01', '["12 inch","Comments : dftr"]'),
(0, '', 'pv01', '["12 inch","Comments :  bgbg"]'),
(0, '', 'pv01', '["undefined inch","Comments : "]'),
(0, 'Surya', 'd01', '["undefined inch","Comments : "]'),
(0, 'Surya', 'pv01', '["undefined inch","Comments : "]'),
(0, 'Surya', 'd01', '["undefined inch","Comments : "]'),
(0, 'Surya', 'b08', '["undefined inch","Comments : "]'),
(0, 'Surya', 'paca02', '["Comments : sdf"]'),
(0, 'Surya', 'pc02', '["12 inch","Multigrain Base","Comments : trery"]'),
(0, '', 'pv01', '["12 inch","on","Comments : extra olives"]'),
(0, '', 'b01', '["Comments : "]'),
(0, '', 'pesp01', '["Comments : "]'),
(0, '', 'pv01', '["12 inch","on","Comments : sd"]'),
(0, '', 'pv02', '["12 inch","on","Comments : huhu"]'),
(0, '', 'b01', '["Comments : "]'),
(0, '', 'b05', '["Comments : "]'),
(0, '', 'b06', '["Comments : 2 teaspoon salt and one tea spoon "]'),
(0, '', 'pv01', '["12 inch","on","Comments : hghj"]'),
(0, '', 'pv04', '["9 inch","Classic Refined Wheat Base","Comments : dsfsdf"]'),
(0, '', 'pv02', '["12 inch","Comments : "]'),
(0, '', 'pv02', '["9 inch","on","Comments : drfwer"]'),
(0, '', 'pv01', '["9 inch","on","Comments : 9 inch"]'),
(0, '', 'pv01', '["12 inch","Multigrain Base","Comments : 12inch"]'),
(0, '', 'pv02', '["12 inch","Classic Refined Wheat Base","Comments : Check"]'),
(0, '', 'pv02', '["9 inch","on","Comments : Checking"]'),
(0, '', 'pv01', '["9 inch","on","Comments : ccc"]'),
(0, '', 'pv05', '["9 inch","on","Comments : fff"]'),
(0, '', 'pv02', '["9 inch","Classic Refined Wheat Base","Comments : ddd"]'),
(0, '', 'pv02', '["9 inch","Whole Wheat Base","Comments : cvb"]'),
(0, '', 'pv06', '["12 inch","Classic Refined Wheat Base","Comments : New"]'),
(0, '', 'pv03', '["12 inch","Multigrain Base","Comments : New one"]'),
(0, '', 'pv02', '["9 inch","Classic Refined Wheat Base","Comments : With more sauce and spinach"]'),
(0, '', 'pv01', '["12 inch","Classic Refined Wheat Base","Comments : hi hello\n"]'),
(0, '', 'pv01', '["9 inch","Classic Refined Wheat Base","Comments : extra olives,no cheese"]'),
(0, '', 'pv02', '["12 inch","Multigrain Base","Comments : extra spice"]'),
(0, '', 'pv05', '["12 inch","Gluten- free Base(Millets)","Comments : no tomato"]'),
(0, '', 'pv01', '["12 inch","Whole Wheat Base","Comments : extra olives"]'),
(0, '', 'pv02', '["12 inch","Multigrain Base","Comments : no cheese"]'),
(0, '', 'pv01', '["Comments : "]'),
(0, '', 'paca01', '["Comments : extra cheese"]'),
(0, '', 'pv01', '["12 inch","Classic Refined Wheat Base","Comments : "]'),
(0, '', 'pv01', '["12 inch","Gluten- free Base(Millets)","Comments : "]'),
(0, '', 'pv02', '["12 inch","Classic Refined Wheat Base","Comments : "]'),
(0, '', 'pv03', '["9 inch","Classic Refined Wheat Base","Comments : extra olives"]'),
(0, 'Surya', 'pv04', '["12 inch","Classic Refined Wheat Base","Comments : muah"]'),
(0, '', 'pesp01', '["Gluten- free Base(Millets)","Comments : New commet"]'),
(0, '', 'pv01', '["9 inch","Classic Refined Wheat Base","Comments : ddd"]'),
(0, '', 'pv04', '["9 inch","Classic Refined Wheat Base","Comments : xxxx"]'),
(0, '', 'pv01', '["9 inch","Multigrain Base","Comments : sdasd"]'),
(0, '', 'pv04', '["12 inch","Multigrain Base","Comments : asdasd"]'),
(0, '', 'pv01', '["12 inch","Classic Refined Wheat Base","Comments : sdfsd"]'),
(0, '', 'pv01', '["9 inch","Multigrain Base","Comments : dsf"]'),
(0, '', 'pv02', '["12 inch","Whole Wheat Base","Comments : dfsdf"]'),
(0, '', 'pv04', '["12 inch","Multigrain Base","Comments : dtgdf"]'),
(0, '', 'pesp01', '["Gluten- free Base(Millets)","Comments : "]'),
(0, '', 'paca01', '["Gluten- free Base(Millets)","Comments : HEEHA"]'),
(0, '', 'paca02', '["Whole Wheat Base","Comments : HEEHA"]'),
(0, '', 'pesp02', '["Classic Refined Wheat Base","Comments : "]'),
(0, '', 'pv01', '["9 inch","Classic Refined Wheat Base","Comments : hi"]'),
(0, '', 'paca03', '["Penne Rigate","Comments : hello"]'),
(0, 'Surya', 'pv01', '["12 inch","Whole Wheat Base","Comments : sdf"]'),
(0, 'Surya', 'pv02', '["9 inch","Whole Wheat Base","Comments : ghh"]'),
(0, 'Surya', 'pv01', '["12 inch","Whole Wheat Base","Comments : "]'),
(0, 'Surya', 'pv02', '["9 inch","Classic Refined Wheat Base","Comments : "]'),
(0, '', 'pv01', '["12 inch","Whole Wheat Base","Comments : "]'),
(0, 'Surya', 'pv01', '["12 inch","Classic Refined Wheat Base","Comments : surya"]'),
(0, 'Surya', 'pv02', '["12 inch","Multigrain Base","Comments : yeah boy"]'),
(0, 'Surya', 'pv04', '["12 inch","Multigrain Base","Comments : 1234\n"]'),
(0, 'Surya', 'pb01', '["Comments : hi baby"]'),
(0, 'Surya', 'pv03', '["12 inch","Classic Refined Wheat Base","Comments : hhhh"]'),
(0, 'Surya', 'pv02', '["12 inch","Classic Refined Wheat Base","Comments : "]'),
(0, '', 'ap03', '["Comments : "]'),
(0, '', 'ap04', '["Comments : "]'),
(0, '', 'ap03', '["12 inch","Whole Wheat Base","Comments : "]'),
(0, '', 'ap04', '["12 inch","Gluten-free Base (Millets)","Comments : asdasdasdasds"]'),
(0, '', 'pv01', '["12 inch","Whole Wheat Base","Comments : no olives"]'),
(0, '', 'pv02', '["12 inch","Gluten- free Base(Millets)","Comments : c\\hh"]'),
(0, '', 'zu01', '["Comments : sss"]'),
(0, '', 'in01', '["Comments : "]'),
(0, '', 'pb01', '["Fresh Mozzarella Cheese, Tomatoes and Pesto Sauce","Comments : "]'),
(0, '', 'ap01', '["Comments : asds"]'),
(0, '', 'pv01', '["Comments : "]'),
(0, '', 'pb01', '["Cream Cheese, Sweet Peppers, Herbs and Green Olives","Comments : Test 123"]'),
(0, '', 'pb01', '["Fresh Mozzarella Cheese, Tomatoes and Pesto Sauce","Comments : Test"]'),
(0, '', 'pb01', '["Cream Cheese, Sweet Peppers, Herbs and Green Olives","Comments : Testing"]'),
(0, 'user', 'pb01', '["Sliced Chicken Breast, Mozzarella Cheese, Pesto Sauce and Mushrooms","Comments : Tesyyy"]'),
(0, 'user', 'in03', '["Add Chicken - 75","Comments : Testy"]'),
(0, 'user', 'pb01', '["Fresh Mozzarella Cheese, Tomatoes and Pesto Sauce - 285","Comments : hi"]');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `sno` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `store_id` varchar(8) NOT NULL,
  `emp_name` varchar(35) NOT NULL,
  `emp_no` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`sno`, `emp_id`, `store_id`, `emp_name`, `emp_no`) VALUES
(1, 1111, '34440', 'Ram', '9566994450'),
(2, 2222, '34440', 'Vinz', '9876543210'),
(7, 3333, '34440', 'emp1', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(80) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `store_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sno`, `name`, `username`, `mobile`, `address`, `pass`, `role`, `store_no`) VALUES
(5, 'Ram Vinoth', 'emp@gmail.com', '9566994450', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101', 'emp', 'emp', 1),
(6, 'Ram Vinoth', 'call@gmail.com', '9566994450', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101', 'call', 'call', 1),
(7, 'Surya', 'admin@gmail.com', '97501582350', '73A, Akshaya colony, Anna nagar', 'admin', 'admin', 1),
(8, 'Ram Vinoth', 'user@gmail.com', '9566994450', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101', 'user', 'user', 1),
(9, 'Surya', 'surya@gmail.com', '9750158235', 'qsadas', 'surya', 'user', 1),
(10, 'suryaz', 'mailsuryz@gmail.com', '9750158235', 'asdef', 'surya', 'user', 1),
(11, 'Ram Vinoth', 'user@gmail.com', '9566994455', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101', '', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `sno` int(11) NOT NULL,
  `store_no` int(11) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`sno`, `store_no`, `pincode`) VALUES
(5, 41763, 600006),
(6, 41763, 600034),
(8, 41763, 600014),
(12, 41763, 600086),
(14, 41763, 600004),
(15, 35451, 600018),
(16, 35451, 600008),
(17, 35451, 600031),
(18, 35451, 600010),
(19, 35451, 600094),
(20, 35451, 600119),
(21, 35451, 600115),
(23, 35451, 600097),
(27, 35451, 603112),
(28, 35451, 600041),
(33, 41762, 603103),
(35, 41762, 600041),
(38, 41762, 600035),
(40, 41762, 600004),
(41, 38693, 600017),
(45, 43206, 600085),
(46, 43206, 600028),
(47, 43206, 600020),
(49, 43206, 600005);

-- --------------------------------------------------------

--
-- Table structure for table `products_list_1`
--

CREATE TABLE `products_list_1` (
  `sno` int(11) NOT NULL,
  `p_id` varchar(60) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `dot` varchar(10) NOT NULL,
  `p_desc` varchar(500) NOT NULL,
  `p_image` varchar(60) NOT NULL,
  `p_price` int(11) NOT NULL,
  `category` text NOT NULL,
  `filter` text NOT NULL,
  `available` int(11) NOT NULL,
  `twelve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list_1`
--

INSERT INTO `products_list_1` (`sno`, `p_id`, `p_name`, `dot`, `p_desc`, `p_image`, `p_price`, `category`, `filter`, `available`, `twelve`) VALUES
(0, 'nvmb', 'Non-Veg Meal Box', '', 'Green Salad, Pickle, Pappad and Raita. 2 starters (1 veg & 1 non-veg). Main Course - Chicken Curry,Dal or Veg Curry,Non-Veg biriyani, 2pcs Tandoori Roti, Sweet', '', 275, 'Non-Veg Meal Box', 'c1', 1, 0),
(2, 'vmb', 'Veg Meal Box', '', 'Green Salad, Pickle, Pappad and Raita. 2 starters (1 paneer& 1 veg). Main Course (1 Gravy & 1 Dal), Rice ( Veg biriyani, Pulao or Jeera rice), 2pcs Tandoori Roti, Sweet', '', 225, 'Veg Meal Box', 'c1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_list_2`
--

CREATE TABLE `products_list_2` (
  `sno` int(11) NOT NULL,
  `p_id` varchar(60) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `p_desc` varchar(500) NOT NULL,
  `p_image` varchar(60) NOT NULL,
  `p_price` int(11) NOT NULL,
  `category` text NOT NULL,
  `available` int(11) NOT NULL,
  `twelve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list_2`
--

INSERT INTO `products_list_2` (`sno`, `p_id`, `p_name`, `p_desc`, `p_image`, `p_price`, `category`, `available`, `twelve`) VALUES
(1, 'vmb01', 'Veg Meal Box', 'Paneer Butter Masala,Daal Tadka,Ghee Rice,Veg Starter (2Nos),Green Salad,Raitha,Sweet,Roti.', 'Mushroom Soup.jpg', 180, 'Veg Meal Box', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_list_3`
--

CREATE TABLE `products_list_3` (
  `sno` int(11) NOT NULL,
  `p_id` varchar(60) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `p_desc` varchar(500) NOT NULL,
  `p_image` varchar(60) NOT NULL,
  `p_price` int(11) NOT NULL,
  `category` text NOT NULL,
  `available` int(11) NOT NULL,
  `twelve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list_3`
--

INSERT INTO `products_list_3` (`sno`, `p_id`, `p_name`, `p_desc`, `p_image`, `p_price`, `category`, `available`, `twelve`) VALUES
(2, 'nvmb', 'Non-Veg Combo', 'Butter Chicken, Daal Tadka, Ghee Rice, Non - Veg Starter (2Nos), Green Salad, Raitha, Sweet, Roti.', 'sub04.jpg', 199, 'Non-Veg Meal  Combo', 1, 0),
(1, 'vmb', 'Veg Meal Combo', 'Paneer Butter Masala, Daal Tadka, Ghee Rice, Veg Starter (2Nos), Green Salad, Raitha, Sweet, Roti.', 'Mushroom Soup.jpg', 180, 'Veg Meal Combo', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_list_4`
--

CREATE TABLE `products_list_4` (
  `sno` int(11) NOT NULL,
  `p_id` varchar(60) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `p_desc` varchar(500) NOT NULL,
  `p_image` varchar(60) NOT NULL,
  `p_price` int(11) NOT NULL,
  `category` text NOT NULL,
  `available` int(11) NOT NULL,
  `filter` varchar(20) NOT NULL,
  `twelve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list_4`
--

INSERT INTO `products_list_4` (`sno`, `p_id`, `p_name`, `p_desc`, `p_image`, `p_price`, `category`, `available`, `filter`, `twelve`) VALUES
(1, 'nvmb', 'Non-Veg Meal Box', 'Green Salad, Pickle, Pappad and Raita. 2 starters (1 veg & 1 non-veg). Main Course - Chicken Curry,Dal or Veg Curry,Non-Veg biriyani, 2pcs Tandoori Roti, Sweet', 'Mushroom Soup.jpg', 275, 'Non-Veg Meal Box', 1, 'c4', 0),
(2, 'vmb', 'Veg Meal Box', 'Clear Chicken Soup with minced Chicken Dumplings, Spinach, Parmesan\n\nCheese and whisked EggGreen Salad, Pickle, Pappad and Raita. 2 starters (1 paneer& 1 veg). Main Course (1 Gravy & 1 Dal), Rice ( Veg biriyani, Pulao or Jeera rice), 2pcs Tandoori Roti, Sweet', 'sub04.jpg', 225, 'Veg Meal Box', 1, 'c4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `sno` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `store` varchar(40) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `people` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`sno`, `timestamp`, `name`, `mobile`, `store`, `date`, `time`, `people`) VALUES
(1, '2015-10-28 17:28:21', 'Ram Vinoth', '9566994450', '', '10/31/2015', '10%', '20'),
(2, '2015-10-28 17:44:40', 'Ram Vinoth P', '9566994450', '', '11/10/2015', '>8pm- 20%', '20'),
(3, '2015-11-13 16:45:15', 'nabd', '32569825', '', '11/01/2015', '5pm- 15%', ''),
(4, '2015-11-18 17:48:36', 'Ram Vinoth', '9566994450', 'CHAMIERS', '11/26/2015', '2pm- 20%', '3'),
(5, '2015-11-19 11:38:27', '', '', 'WALLACE GARDEN', '11/28/2015', '8pm- 15%', '2'),
(6, '2015-11-23 07:20:27', 'surya', '9750158235', 'CHAMIERS', '11/24/2015', '12pm- 15%', '5'),
(7, '2015-11-23 18:00:53', 'ramvinoth37@gmail.com', '9566994450', 'ECR', '12/16/2015', '4pm- 30%', '4'),
(8, '2015-11-24 15:49:36', 'surya', '9750158235', 'CHAMIERS', '12/17/2015', '6pm- 30%', '4'),
(9, '2015-11-25 17:21:25', 'suryz', '1213546456', 'ECR', '12/04/2015', '9pm- 20%', '4'),
(10, '2015-12-04 06:51:18', 'suryayo', '97501', 'WALLACE GARDEN', '12/26/2015', '8pm- 20%', '4'),
(11, '2015-12-09 07:40:25', 'surya', '9750158235', 'WALLACE GARDEN', '12/25/2015', '12pm- 20%', '4'),
(12, '2015-12-10 20:27:35', 'asd', 'asd', 'ECR', '12/03/2015', '12pm- 15%', '4');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `store_id` varchar(20) NOT NULL,
  `json` varchar(5000) NOT NULL,
  `type` text NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `address` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `date`, `name`, `order_id`, `store_id`, `json`, `type`, `mobile`, `address`, `amount`, `payment`, `status`) VALUES
(140, '2015-12-04 15:23:49', 'nnn', 'TUS000140', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:3;s:4:"name";s:28:"Onion and Minced Black Olive";s:4:"code";s:4:"pv03";s:3:"qty";s:1:"6";s:5:"price";i:595;s:3:"img";s:28:"Onion Minced Black Olive.jpg";s:5:"addon";s:58:"["12 inch","Classic Refined Wheat Base","Comments : hhhh"]";s:5:"upsub";i:0;}}', 'Takeaway', '999', '-', 3570, 'HeyPay', 'On-Process'),
(143, '2015-12-06 12:09:17', 'Ram Vinoth', 'TUS000143', '2', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:23:"Baked Stuffed Mushrooms";s:5:"price";i:345;s:5:"upsub";i:0;s:3:"img";s:26:"Baked Stuffed Mushroom.jpg";s:4:"code";s:4:"ap02";s:3:"qty";s:1:"2";s:5:"addon";s:19:"["Comments : Test"]";}}', 'delivery', '9566994450', 'Test 1235', 690, 'HeyPay', 'On-Process'),
(144, '2015-12-06 12:11:58', 'Ram Vinoth', 'TUS000144', '2', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:23:"Baked Stuffed Mushrooms";s:5:"price";i:345;s:5:"upsub";i:0;s:3:"img";s:26:"Baked Stuffed Mushroom.jpg";s:4:"code";s:4:"ap02";s:3:"qty";s:1:"2";s:5:"addon";s:23:"["Comments : Test 123"]";}}', 'takeway', '9566994450', 'Ram 123 Teaest', 690, 'HeyPay', 'On-Process'),
(145, '2015-12-06 12:41:11', 'Rfgh', 'TUS000145', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:8:"Focaccia";s:5:"price";i:285;s:5:"upsub";i:0;s:3:"img";s:11:"bf12i02.png";s:4:"code";s:4:"pb01";s:3:"qty";s:1:"1";s:5:"addon";s:15:"["Comments : "]";}}', 'takeway', 'Fhj', 'Fgh', 285, 'HeyPay', 'On-Process'),
(146, '2015-12-09 08:14:02', 'surys', 'TUS000146', '1', 'a:3:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:10:"Margherita";s:4:"code";s:4:"pv01";s:3:"img";s:14:"Margherita.jpg";s:3:"qty";s:1:"1";s:5:"price";i:495;s:5:"upsub";i:0;s:5:"addon";s:53:"["12 inch","Whole Wheat Base","Comments : no olives"]";}i:1;a:8:{s:3:"sno";i:1;s:4:"name";s:20:"Spinach and Mushroom";s:4:"code";s:4:"pv02";s:3:"img";s:20:"Spinach Mushroom.jpg";s:3:"qty";s:1:"1";s:5:"price";i:545;s:5:"upsub";i:0;s:5:"addon";s:59:"["12 inch","Gluten- free Base(Millets)","Comments : c\\hh"]";}i:2;a:8:{s:3:"sno";i:2;s:4:"name";s:19:"Minestrone al Pesto";s:5:"price";i:275;s:5:"upsub";i:0;s:3:"img";s:14:"MInestrone.jpg";s:4:"code";s:4:"zu01";s:3:"qty";s:1:"1";s:5:"addon";s:18:"["Comments : sss"]";}}', 'Takeaway', '9750158235', '-', 1315, 'HeyPay', 'On-Process'),
(147, '2015-12-09 16:35:10', 'Ram Vinoth', 'TUS000147', '1', 'a:2:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:18:"Mozzarella Cheese ";s:4:"code";s:4:"pb03";s:3:"img";s:0:"";s:3:"qty";s:1:"2";s:5:"price";i:285;s:5:"upsub";i:0;s:5:"addon";s:19:"["Comments : Test"]";}i:1;a:8:{s:3:"sno";i:1;s:4:"name";s:21:"Sliced Chicken Breast";s:5:"price";i:355;s:5:"upsub";i:0;s:3:"img";s:0:"";s:4:"code";s:4:"pb05";s:3:"qty";s:1:"2";s:5:"addon";s:26:"["Comments : Testing 123"]";}}', 'delivery', '9566994450', '123sf dsfsdf', 1280, 'HeyPay', 'On-Process'),
(148, '2015-12-21 16:09:58', 'Ram Vinoth', 'TUS000148', '1', 'a:2:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:8:"Focaccia";s:4:"code";s:4:"pb01";s:3:"qty";s:1:"1";s:5:"price";i:640;s:3:"img";s:12:"Focaccia.jpg";s:5:"addon";s:91:"["Sliced Chicken Breast, Mozzarella Cheese, Pesto Sauce and Mushrooms","Comments : Tesyyy"]";s:5:"upsub";s:3:"355";}i:1;a:8:{s:3:"sno";i:1;s:4:"name";s:20:"Classic Caesar Salad";s:4:"code";s:4:"in03";s:3:"qty";s:1:"2";s:5:"price";i:550;s:3:"img";s:16:"Caesar Salad.jpg";s:5:"addon";s:39:"["Add Chicken - 75","Comments : Testy"]";s:5:"upsub";s:2:"75";}}', 'Delivery', '9566994450', 'Ram4/20,Welcome Colony, Anna nagar West Extension, Chennai-101', 1740, 'HeyPay', 'On-Process'),
(149, '2015-12-21 18:21:51', 'Ram Vinoth', 'TUS000149', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:8:"Focaccia";s:5:"price";i:570;s:5:"upsub";s:3:"285";s:3:"img";s:12:"Focaccia.jpg";s:4:"code";s:4:"pb01";s:3:"qty";s:1:"1";s:5:"addon";s:75:"["Fresh Mozzarella Cheese, Tomatoes and Pesto Sauce - 285","Comments : hi"]";}}', 'Takeaway', '9566994450', '-', 570, 'HeyPay', 'On-Process'),
(150, '2016-02-02 16:00:40', 'surya', 'TUS000150', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:8:"Focaccia";s:5:"price";i:285;s:5:"upsub";i:0;s:3:"img";s:12:"Focaccia.jpg";s:4:"code";s:4:"pb01";s:3:"qty";s:1:"2";s:5:"addon";s:15:"["Comments : "]";}}', 'delivery', '9', 'sad', 570, 'HeyPay', 'On-Process'),
(151, '2016-02-02 17:49:52', 'Ram', 'TUS000151', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:12:"VEG Meal Box";s:5:"price";i:199;s:5:"upsub";i:0;s:3:"img";s:28:"Golden Ricotta Dumplings.jpg";s:4:"code";s:3:"v01";s:3:"qty";s:1:"3";s:5:"addon";s:1:"-";}}', 'takeway', '9566994450', 'Test\n', 597, 'HeyPay', 'On-Process'),
(152, '2016-02-04 08:39:02', 'surya', 'TUS000152', '1', 'a:1:{i:0;a:8:{s:3:"sno";i:0;s:4:"name";s:8:"Focaccia";s:5:"price";i:285;s:5:"upsub";i:0;s:3:"img";s:12:"Focaccia.jpg";s:4:"code";s:4:"pb01";s:3:"qty";s:1:"2";s:5:"addon";s:15:"["Comments : "]";}}', 'delivery', '9750158235', 'as', 570, 'HeyPay', 'On-Process');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `email`, `mobile`, `address`) VALUES
(1, 'Ram Vinoth', 'user@gmail.com', '9566994455', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101'),
(2, 'Ram Vinoth', 'user@gmail.com', '9566994450', 'Ram\r\n4/20,Welcome Colony, Anna nagar West Extension, Chennai-101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `products_list_1`
--
ALTER TABLE `products_list_1`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `products_list_2`
--
ALTER TABLE `products_list_2`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `products_list_3`
--
ALTER TABLE `products_list_3`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `products_list_4`
--
ALTER TABLE `products_list_4`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `products_list_1`
--
ALTER TABLE `products_list_1`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products_list_2`
--
ALTER TABLE `products_list_2`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products_list_3`
--
ALTER TABLE `products_list_3`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products_list_4`
--
ALTER TABLE `products_list_4`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
