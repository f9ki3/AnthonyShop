-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','superadmin') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `email`, `contact`, `address`, `password`, `created_at`) VALUES
(6, 'Juan', 'Dela Cruz', 'jdela cruz362', 'juan@gmail.com', '09120912091', 'Marilao, Bulacan', '$2y$10$NtXmJl3hHr4JZidSBQ52Beyc2VB/hUImT7ZEgoRCLER.cfeBph/TW', '2025-01-28 17:46:41'),
(7, 'Juliana', 'Padrigon', 'jdela cruz512', 'juliana@gmail.com', '0912127612761', 'Bocaue. Bulacan', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', '2025-01-28 17:53:37'),
(9, 'Robert', 'Moore', 'rmoore244', 'robert@gmail.com', '09871287761', 'Marilao, Bulacan', '$2y$10$cte6EXW9W3nFGRyUIVdnuu3CcwnXbkGt6zVzT7Gnz6lPoTjJ9.E/y', '2025-01-28 23:08:49'),
(10, 'Fyke', 'Lleva', 'flleva859', 'floterina@gmail.com', '09120912091', 'Marilao, Bulacan', '$2y$10$G7POanatX.aldweeMG1xX.Foe97fuU9gtyo2KRzDEJqlS3/sdzCwS', '2025-01-29 12:31:01'),
(11, 'Sarah', 'Dela Cruz', 'smacaraig663', 'sarah@gmail.com', '09120912091', 'Bocaue, Bulacan', '$2y$10$Hlp8AUuMveoHjd9tpjXZ8eIuBPxlgEjy7dXArwbWOU7t7gRZlYW5e', '2025-01-29 12:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(11) NOT NULL,
  `order_hash` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `cart_items` text NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `gcash_reference` varchar(100) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `order_hash`, `user_id`, `firstname`, `lastname`, `contact`, `email`, `address`, `cart_items`, `payment_type`, `gcash_reference`, `subtotal`, `shipping_fee`, `total`, `status`, `order_date`) VALUES
(1, '91303b30fd8f4dee', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"},{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"}]', 'cod', 'None', 235.00, 120.00, 355.00, 'canceled', '2025-01-28 16:05:00'),
(2, 'c0e8aa7dc311abe9', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"},{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"}]', 'gcash', '55612712', 235.00, 120.00, 355.00, 'canceled', '2025-01-28 16:05:00'),
(3, 'ede2eed7db68c828', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":50,\"id\":\"36\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":50,\"id\":\"38\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'canceled', '2025-01-28 16:05:00'),
(4, '2180fda4d772f1ce', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":49,\"id\":\"35\"},{\"name\":\"Hekaido\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/hekaido.jpg\",\"stocks\":50,\"id\":\"37\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'canceled', '2025-01-28 16:05:00'),
(5, '51afcdc14f045df6', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"}]', 'cod', 'None', 170.00, 120.00, 290.00, 'canceled', '2025-01-28 16:05:00'),
(6, '1cbf999599ffd74a', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":46,\"id\":\"11\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":50,\"id\":\"39\"}]', 'cod', 'None', 265.00, 120.00, 385.00, 'pending', '2025-01-28 16:05:00'),
(7, 'fbc69ee5aaa9188d', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Liver\",\"quantity\":1,\"price\":200,\"total\":\"200.00\",\"img\":\"..\\/static\\/img\\/chickenliver.jpg\",\"stocks\":50,\"id\":\"27\"}]', 'cod', 'None', 200.00, 120.00, 320.00, 'pending', '2025-01-28 16:05:00'),
(8, '2b98a71289dea964', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":49,\"id\":\"35\"},{\"name\":\"Hekaido\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/hekaido.jpg\",\"stocks\":50,\"id\":\"37\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'pending', '2025-01-28 16:05:00'),
(9, 'fe498cc50476ad6d', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":2,\"price\":100,\"total\":\"200.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":48,\"id\":\"35\"},{\"name\":\"CDO: Cornbeef\",\"quantity\":1,\"price\":50,\"total\":\"50.00\",\"img\":\"..\\/static\\/img\\/cdocornbeef.jpeg\",\"stocks\":50,\"id\":\"16\"}]', 'cod', 'None', 250.00, 120.00, 370.00, 'accepted', '2025-01-28 16:05:00'),
(10, '26155080274c67d0', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":50,\"id\":\"36\"}]', 'cod', 'None', 100.00, 120.00, 220.00, 'pending', '2025-01-28 16:05:00'),
(11, '6850824e1241afba', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":50,\"id\":\"34\"}]', 'cod', 'None', 35.00, 120.00, 155.00, 'completed', '2025-01-28 16:07:45'),
(12, 'e68069f6533bb92a', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Whole Chicken\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/wholechicken.jpg\",\"stocks\":50,\"id\":\"29\"},{\"name\":\"CDO: Cornbeef\",\"quantity\":1,\"price\":50,\"total\":\"50.00\",\"img\":\"..\\/static\\/img\\/cdocornbeef.jpeg\",\"stocks\":49,\"id\":\"16\"},{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":49,\"id\":\"34\"}]', 'cod', 'None', 265.00, 120.00, 385.00, 'canceled', '2025-01-28 16:11:02'),
(13, 'e8e126e2f5a0e566', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":2,\"price\":190,\"total\":\"380.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":50,\"id\":\"28\"},{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":45,\"id\":\"11\"}]', 'cod', 'None', 560.00, 120.00, 680.00, 'canceled', '2025-01-28 16:11:23'),
(14, '0842ed34fa766b94', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"CDO: Big Time Footlong\",\"quantity\":1,\"price\":175,\"total\":\"175.00\",\"img\":\"..\\/static\\/img\\/cdobigtimefootlong.jpeg\",\"stocks\":50,\"id\":\"15\"},{\"name\":\"CDO: Ulam Burger\",\"quantity\":1,\"price\":60,\"total\":\"60.00\",\"img\":\"..\\/static\\/img\\/ulamburger.png\",\"stocks\":50,\"id\":\"13\"}]', 'cod', 'None', 235.00, 120.00, 355.00, 'canceled', '2025-01-28 16:12:16'),
(15, '11bf5c29c48f6ba5', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":3,\"price\":190,\"total\":\"570.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":48,\"id\":\"28\"}]', 'cod', 'None', 570.00, 120.00, 690.00, 'pending', '2025-01-28 16:39:52'),
(16, '6263dcf3de0c6c14', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":48,\"id\":\"34\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":50,\"id\":\"38\"}]', 'cod', 'None', 61.00, 120.00, 181.00, 'pending', '2025-01-28 16:40:44'),
(17, '2ded15c172b3a721', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":1,\"price\":190,\"total\":\"190.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":45,\"id\":\"28\"}]', 'cod', 'None', 190.00, 120.00, 310.00, 'pending', '2025-01-28 17:28:06'),
(18, 'fcea6c12dd2fbe5e', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":1,\"price\":190,\"total\":\"190.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":44,\"id\":\"28\"}]', 'cod', 'None', 190.00, 120.00, 310.00, 'pending', '2025-01-28 17:28:22'),
(19, 'ed0fa1fe5760bcea', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Feet\\/Neck\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/chickenfeet,neck.jpg\",\"stocks\":47,\"id\":\"24\"}]', 'cod', 'None', 130.00, 120.00, 250.00, 'pending', '2025-01-28 17:29:10'),
(20, 'ad751bc0ee616740', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":49,\"id\":\"23\"}]', 'gcash', '512716281', 170.00, 120.00, 290.00, 'pending', '2025-01-28 17:51:27'),
(21, 'c6991b8316f339eb', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":47,\"id\":\"34\"},{\"name\":\"Mang Esting\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangesting.jpg\",\"stocks\":50,\"id\":\"40\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":49,\"id\":\"39\"},{\"name\":\"Reno\",\"quantity\":1,\"price\":32,\"total\":\"32.00\",\"img\":\"..\\/static\\/img\\/reno.jpg\",\"stocks\":50,\"id\":\"45\"}]', 'gcash', '551281289', 262.00, 120.00, 382.00, 'pending', '2025-01-28 17:56:20'),
(22, '1378c2dab6dbbf1d', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Mang Esting\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangesting.jpg\",\"stocks\":49,\"id\":\"40\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":49,\"id\":\"38\"},{\"name\":\"Tender Juicy Hotdog\",\"quantity\":1,\"price\":195,\"total\":\"195.00\",\"img\":\"..\\/static\\/img\\/tenderjuicyhotdog.jpg\",\"stocks\":50,\"id\":\"19\"},{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":49,\"id\":\"36\"},{\"name\":\"CDO: Karne Norte\",\"quantity\":1,\"price\":28,\"total\":\"28.00\",\"img\":\"..\\/static\\/img\\/cdokarnenorte.png\",\"stocks\":50,\"id\":\"18\"}]', 'cod', 'None', 459.00, 120.00, 579.00, 'pending', '2025-01-29 03:09:08'),
(23, '922ee67f7f621f6f', 10, 'Fyke', 'Lleva', '09120912091', 'floterina@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Intestine\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/chickenintestine.jpg\",\"stocks\":50,\"id\":\"25\"},{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":48,\"id\":\"36\"},{\"name\":\"Mang Kevin\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangkevin.jpg\",\"stocks\":50,\"id\":\"41\"}]', 'cod', 'None', 340.00, 120.00, 460.00, 'pending', '2025-01-29 04:31:43'),
(24, 'c65fe5ba6222000b', 10, 'Fyke', 'Lleva', '09120912091', 'floterina@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"},{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":44,\"id\":\"11\"},{\"name\":\"CDO: Karne Norte\",\"quantity\":1,\"price\":28,\"total\":\"28.00\",\"img\":\"..\\/static\\/img\\/cdokarnenorte.png\",\"stocks\":49,\"id\":\"18\"},{\"name\":\"Pancit Canton\",\"quantity\":1,\"price\":40,\"total\":\"40.00\",\"img\":\"..\\/static\\/img\\/pancitcanton.jpg\",\"stocks\":50,\"id\":\"44\"}]', 'cod', 'None', 313.00, 120.00, 433.00, 'pending', '2025-01-29 04:32:11'),
(25, '5ba05e5466af3946', 11, 'Sarah', 'Macaraig', '09120912091', 'sarah@gmail.com', 'Bocaue, Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":46,\"id\":\"35\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":48,\"id\":\"39\"},{\"name\":\"Tender Juicy Hotdog\",\"quantity\":1,\"price\":195,\"total\":\"195.00\",\"img\":\"..\\/static\\/img\\/tenderjuicyhotdog.jpg\",\"stocks\":49,\"id\":\"19\"}]', 'gcash', '5534123', 380.00, 120.00, 500.00, 'pending', '2025-01-29 04:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` enum('Frozen','Chicken','Grocery') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image_path`, `category`) VALUES
(10, 'CDO: Chicken Frank', '', 100, 29, 'chickenfranks.jpg', 'Frozen'),
(11, 'CDO: Idol Cheesedog', '', 180, 43, 'idolcheesedog.jpg', 'Frozen'),
(12, 'CDO: Pork Longganisa', '', 75, 50, 'porklongganisa.jpg', 'Frozen'),
(13, 'CDO: Ulam Burger', '', 60, 49, 'ulamburger.png', 'Frozen'),
(14, 'CDO: Young Pork Tocino', '', 65, 49, 'youngporktocino.png', 'Frozen'),
(15, 'CDO: Big Time Footlong', '', 175, 49, 'cdobigtimefootlong.jpeg', 'Frozen'),
(16, 'CDO: Cornbeef', '', 50, 48, 'cdocornbeef.jpeg', 'Frozen'),
(17, 'CDO: Sweetham', '', 85, 50, 'cdosweetham.png', 'Frozen'),
(18, 'CDO: Karne Norte', '', 28, 48, 'cdokarnenorte.png', 'Frozen'),
(19, 'Tender Juicy Hotdog', '', 195, 48, 'tenderjuicyhotdog.jpg', 'Frozen'),
(20, 'Pampanga\'s Best Sweetham', '', 65, 50, 'pampangasbestsweetham.jpeg', 'Frozen'),
(23, 'Chicken Breast', '', 170, 48, 'chickenbrest.jpg', 'Chicken'),
(24, 'Chicken Feet/Neck', '', 130, 46, 'chickenfeet,neck.jpg', 'Chicken'),
(25, 'Chicken Intestine', '', 130, 49, 'chickenintestine.jpg', 'Chicken'),
(26, 'Chicken Legs', '', 200, 50, 'chickenlegs.jpg', 'Chicken'),
(27, 'Chicken Liver', '', 200, 49, 'chickenliver.jpg', 'Chicken'),
(28, 'Chicken Wings', '', 190, 43, 'chickenwings.jpg', 'Chicken'),
(29, 'Whole Chicken', '', 180, 49, 'wholechicken.jpg', 'Chicken'),
(34, 'Argentina Corned Beef', '', 35, 46, 'argentinacornedbeef.jpg', 'Grocery'),
(35, 'Bigtime Cheese', '', 100, 45, 'bigtimecheese.jpg', 'Grocery'),
(36, 'Daily Quezo', '', 100, 47, 'dailyquezo.jpg', 'Grocery'),
(37, 'Hekaido', '', 26, 49, 'hekaido.jpg', 'Grocery'),
(38, 'Hunt Pork and Beans', '', 26, 48, 'huntporkandbeans.jpg', 'Grocery'),
(39, 'Luncheon Meat', '', 85, 47, 'luncheonmeat.jpg', 'Grocery'),
(40, 'Mang Esting', '', 110, 48, 'mangesting.jpg', 'Grocery'),
(41, 'Mang Kevin', '', 110, 49, 'mangkevin.jpg', 'Grocery'),
(42, 'Mega', '', 25, 50, 'mega.jpg', 'Grocery'),
(43, 'OK Cheese', '', 100, 50, 'okcheese.jpg', 'Grocery'),
(44, 'Pancit Canton', '', 40, 49, 'pancitcanton.jpg', 'Grocery'),
(45, 'Reno', '', 32, 49, 'reno.jpg', 'Grocery'),
(46, 'Saba', '', 65, 50, 'saba.jpg', 'Grocery'),
(47, 'Datu Puti Soy Sauce', '', 65, 50, 'soysauce.jpg', 'Grocery'),
(48, 'Super Q Bihon', '', 45, 50, 'superqbihon.jpg', 'Grocery'),
(49, 'Datu Puti Vinegar', '', 60, 50, 'vinegar.jpg', 'Grocery'),
(50, 'Vital Water', '', 17, 50, 'vital.jpg', 'Grocery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
