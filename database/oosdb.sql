-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 03:53 PM
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
  `role` enum('admin','employee') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `email`, `contact`, `address`, `password`, `role`, `created_at`) VALUES
(1, 'Juan', 'Dela Cruz', 'admin', 'admin', '09120912091', 'Marilao, Bulacan', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', 'admin', '2025-01-29 09:49:12'),
(3, 'Arnold', 'Pablo', 'jpablo@gmail.com', 'pablo@gmail.com', '09120912091', 'Marilao, Bulacan', '$2y$10$CDqvKevGRM9OGVRHGyjZhuSE78arjfqe0exnMCMIB68IwMEt71o.a', 'employee', '2025-02-02 08:31:59'),
(4, 'Karl', 'Macaroyo', 'kmacaroyo', 'karl@gmail.com', '09879886789', 'Bocaue, Bulacan', '$2y$10$ZoUvXqKP/EW4rnlfGkRbd.oddH9Oh1NPgCrFirPxrEhc.GmGD9noq', 'employee', '2025-02-02 08:39:08'),
(5, 'Ashley', 'Panaga', 'apanagas', 'ashley@gmail.com', '09120912091', 'San Juan, City', '$2y$10$4g6gEc35OcEBMP2REV3pcOXJCCh6OX9r7PM4hm3ZEfM3RYyoIbaRq', 'employee', '2025-02-02 09:15:54'),
(6, 'Miguels', 'Tan', 'mtan', 'miguel@gmail.com', '09120912091', 'Marikina City', '$2y$10$seqFQCbdjltWd2ZivxtfDuDqRWibJnRY6T7fJsE8KfK51RmDuBlVW', 'employee', '2025-02-02 09:17:34'),
(7, 'Michael', 'Moore', 'mmoore', 'michael@gmail.com', '09789878897', 'Plaridel, Bulacan', '$2y$10$jsSPydRJ71gx1DD.MV17S.0HAKVERAtnGAwovsqRbhOwPAg3uqFWW', 'employee', '2025-02-03 04:50:38'),
(8, 'Nico', 'Alonzo', 'nalonzo', 'nico@gmail.com', '09129812871', 'Balagtas, Bulacan', '$2y$10$E0kIs/dPLCo4k24.Zr4H3OGfbUJVY7TOyV5q5qWztGpp7yENeCTb6', 'employee', '2025-02-03 04:53:32'),
(9, 'Sarah', 'Agustin', 'sagustin', 'sarah@gmail.com', '09120912131', 'Pandi, Bulacan', '$2y$10$yiV3Zn./GygJXmBXdbxn7u9AZr8XpTP7Ml0IXrlDlgMoBa6GO88AW', 'employee', '2025-02-03 04:54:08'),
(10, 'Angels', 'Marcoleta', 'amarcoleta', 'angel@gmail.com', '09120976567', 'Sta. Maria, Bulacan', '$2y$10$.EaEoyo22Fb4aYE1.wZ79uVb.QIxLWl0h96QSzK3JSbtil.jsCdHy', 'employee', '2025-02-03 04:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `user_agent`, `created_at`) VALUES
(3, 3, 'Updated status to accepted for order f22cd364b9ed4749', 'Arnold Pablo', '2025-02-03 13:44:56'),
(4, 3, 'Updated status to completed for order 409d1bc86486b2ba', 'Arnold Pablo', '2025-02-03 13:44:59'),
(5, 3, 'Updated status to delivery for order 20313287c6abf96d', 'Arnold Pablo', '2025-02-03 13:45:08'),
(6, 3, 'Updated status to delivery for order 7af1cb9324eded8a', 'Arnold Pablo', '2025-02-03 13:45:17'),
(7, 3, 'Updated status to accepted for order 6263dcf3de0c6c14', 'Arnold Pablo', '2025-02-03 13:45:24'),
(8, 3, 'Updated status to delivery for order 2ded15c172b3a721', 'Arnold Pablo', '2025-02-03 13:45:29'),
(11, 3, 'Employee login successful', 'Arnold Pablo', '2025-02-03 13:52:42'),
(12, 3, 'Employee logged out', 'Arnold Pablo', '2025-02-03 13:52:44'),
(13, 4, 'Employee login successful', 'Karl Macaroyo', '2025-02-03 13:54:06'),
(14, 4, 'Updated status to accepted for order 922ee67f7f621f6f', 'Karl Macaroyo', '2025-02-03 13:54:12'),
(15, 4, 'Updated status to completed for order 20313287c6abf96d', 'Karl Macaroyo', '2025-02-03 13:54:17'),
(16, 4, 'Updated status to completed for order 7af1cb9324eded8a', 'Karl Macaroyo', '2025-02-03 13:54:21'),
(17, 4, 'Updated status to accepted for order c65fe5ba6222000b', 'Karl Macaroyo', '2025-02-03 13:54:25'),
(18, 4, 'Updated status to accepted for order ede7e77bc323c5ef', 'Karl Macaroyo', '2025-02-03 13:54:27'),
(19, 4, 'Employee logged out', 'Karl Macaroyo', '2025-02-03 13:54:29'),
(20, 4, 'Employee login successful', 'Karl Macaroyo', '2025-02-03 13:54:45'),
(21, 4, 'Employee logged out', 'Karl Macaroyo', '2025-02-03 13:54:48'),
(22, 5, 'Employee login successful', 'Ashley Panaga', '2025-02-03 13:56:16'),
(23, 5, 'Updated status to completed for order 922ee67f7f621f6f', 'Ashley Panaga', '2025-02-03 13:56:21'),
(24, 5, 'Updated status to completed for order f22cd364b9ed4749', 'Ashley Panaga', '2025-02-03 13:56:24'),
(25, 5, 'Updated status to completed for order 0842ed34fa766b94', 'Ashley Panaga', '2025-02-03 13:56:26'),
(26, 5, 'Updated status to completed for order 51afcdc14f045df6', 'Ashley Panaga', '2025-02-03 13:56:36'),
(27, 5, 'Updated status to completed for order ede7e77bc323c5ef', 'Ashley Panaga', '2025-02-03 13:56:40'),
(28, 5, 'Updated status to completed for order c65fe5ba6222000b', 'Ashley Panaga', '2025-02-03 13:56:43'),
(29, 5, 'Employee logged out', 'Ashley Panaga', '2025-02-03 13:56:45');

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
  `created_at` datetime DEFAULT current_timestamp(),
  `barangay` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL DEFAULT 'Bulacan',
  `municipal` varchar(100) NOT NULL DEFAULT 'Plaridel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `email`, `contact`, `address`, `password`, `created_at`, `barangay`, `province`, `municipal`) VALUES
(6, 'Juan', 'Dela Cruz', 'jdela cruz362', 'juan@gmail.com', '09120912091', 'Block 8 Lot 9', '$2y$10$NtXmJl3hHr4JZidSBQ52Beyc2VB/hUImT7ZEgoRCLER.cfeBph/TW', '2025-01-28 17:46:41', 'Banga 1st', 'Bulacan', 'Plaridel'),
(7, 'Juliana', 'Padrigon', 'jdela cruz512', 'juliana@gmail.com', '0912127612761', 'Block 8 Lot 10', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', '2025-01-28 17:53:37', 'Santo Niño', 'Bulacan', 'Plaridel'),
(9, 'Robert', 'Moore', 'rmoore244', 'robert@gmail.com', '09871287761', 'Block 8 Lot 9', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', '2025-01-28 23:08:49', 'Banga 1st', 'Bulacan', 'Plaridel'),
(10, 'Fyke', 'Lleva', 'flleva859', 'floterina@gmail.com', '09120912091', 'Block 8 Lot 9', '$2y$10$G7POanatX.aldweeMG1xX.Foe97fuU9gtyo2KRzDEJqlS3/sdzCwS', '2025-01-29 12:31:01', 'Banga 1st', 'Bulacan', 'Plaridel'),
(11, 'Sarah', 'Dela Cruz', 'smacaraig663', 'sarah@gmail.com', '09120912091', 'Block 8 Lot 9', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', '2025-01-29 12:49:09', 'Banga 1st', 'Bulacan', 'Plaridel'),
(12, 'Mickey', 'Mouse', 'mmouse737', 'mouse@gmail.com', '09120912091', 'Block 8 Lot 9', '$2y$10$.6u3QIDQU835qA.GSp2fPuoP41wQ9fJG3tW.Q5bH35Ux38HpoMszi', '2025-02-02 09:21:49', 'Banga 1st', 'Bulacan', 'Plaridel'),
(13, 'Janes', 'Mary', 'jmary341', 'jane@gmail.com', '0912091209', 'Block 10 Lot 1, Pagaasa Subdivision', '$2y$10$Fr7j8nWOWM9oV9zE5xja1uHrAD4pz7wrQr973.v.w7fHze3IZA1u2', '2025-02-03 20:51:13', 'Bulihan', 'Bulacan', 'Plaridel');

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
(1, '91303b30fd8f4dee', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"},{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"}]', 'cod', 'None', 235.00, 120.00, 355.00, 'canceled', '2024-01-21 16:05:00'),
(2, 'c0e8aa7dc311abe9', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"},{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"}]', 'gcash', '55612712', 235.00, 120.00, 355.00, 'canceled', '2025-01-28 16:05:00'),
(3, 'ede2eed7db68c828', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":50,\"id\":\"36\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":50,\"id\":\"38\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'canceled', '2024-01-17 16:05:00'),
(4, '2180fda4d772f1ce', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":49,\"id\":\"35\"},{\"name\":\"Hekaido\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/hekaido.jpg\",\"stocks\":50,\"id\":\"37\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'canceled', '2024-01-21 16:05:00'),
(5, '51afcdc14f045df6', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":50,\"id\":\"23\"}]', 'cod', 'None', 170.00, 120.00, 290.00, 'completed', '2025-01-31 16:05:00'),
(6, '1cbf999599ffd74a', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":46,\"id\":\"11\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":50,\"id\":\"39\"}]', 'cod', 'None', 265.00, 120.00, 385.00, 'pending', '2025-01-28 16:05:00'),
(7, 'fbc69ee5aaa9188d', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Liver\",\"quantity\":1,\"price\":200,\"total\":\"200.00\",\"img\":\"..\\/static\\/img\\/chickenliver.jpg\",\"stocks\":50,\"id\":\"27\"}]', 'cod', 'None', 200.00, 120.00, 320.00, 'pending', '2025-01-28 16:05:00'),
(8, '2b98a71289dea964', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":49,\"id\":\"35\"},{\"name\":\"Hekaido\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/hekaido.jpg\",\"stocks\":50,\"id\":\"37\"}]', 'cod', 'None', 126.00, 120.00, 246.00, 'pending', '2025-01-28 16:05:00'),
(9, 'fe498cc50476ad6d', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":2,\"price\":100,\"total\":\"200.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":48,\"id\":\"35\"},{\"name\":\"CDO: Cornbeef\",\"quantity\":1,\"price\":50,\"total\":\"50.00\",\"img\":\"..\\/static\\/img\\/cdocornbeef.jpeg\",\"stocks\":50,\"id\":\"16\"}]', 'cod', 'None', 250.00, 120.00, 370.00, 'accepted', '2024-01-21 16:05:00'),
(10, '26155080274c67d0', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":50,\"id\":\"36\"}]', 'cod', 'None', 100.00, 120.00, 220.00, 'pending', '2025-01-21 16:05:00'),
(11, '6850824e1241afba', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":50,\"id\":\"34\"}]', 'cod', 'None', 35.00, 120.00, 155.00, 'completed', '2025-01-28 16:07:45'),
(12, 'e68069f6533bb92a', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Whole Chicken\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/wholechicken.jpg\",\"stocks\":50,\"id\":\"29\"},{\"name\":\"CDO: Cornbeef\",\"quantity\":1,\"price\":50,\"total\":\"50.00\",\"img\":\"..\\/static\\/img\\/cdocornbeef.jpeg\",\"stocks\":49,\"id\":\"16\"},{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":49,\"id\":\"34\"}]', 'cod', 'None', 265.00, 120.00, 385.00, 'canceled', '2024-02-21 16:11:02'),
(13, 'e8e126e2f5a0e566', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":2,\"price\":190,\"total\":\"380.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":50,\"id\":\"28\"},{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":45,\"id\":\"11\"}]', 'cod', 'None', 560.00, 120.00, 680.00, 'canceled', '2025-01-28 16:11:23'),
(14, '0842ed34fa766b94', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"CDO: Big Time Footlong\",\"quantity\":1,\"price\":175,\"total\":\"175.00\",\"img\":\"..\\/static\\/img\\/cdobigtimefootlong.jpeg\",\"stocks\":50,\"id\":\"15\"},{\"name\":\"CDO: Ulam Burger\",\"quantity\":1,\"price\":60,\"total\":\"60.00\",\"img\":\"..\\/static\\/img\\/ulamburger.png\",\"stocks\":50,\"id\":\"13\"}]', 'cod', 'None', 235.00, 120.00, 355.00, 'completed', '2025-01-31 16:12:16'),
(15, '11bf5c29c48f6ba5', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":3,\"price\":190,\"total\":\"570.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":48,\"id\":\"28\"}]', 'cod', 'None', 570.00, 120.00, 690.00, 'pending', '2025-01-28 16:39:52'),
(16, '6263dcf3de0c6c14', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":48,\"id\":\"34\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":50,\"id\":\"38\"}]', 'cod', 'None', 61.00, 120.00, 181.00, 'accepted', '2025-01-28 16:40:44'),
(17, '2ded15c172b3a721', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":1,\"price\":190,\"total\":\"190.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":45,\"id\":\"28\"}]', 'cod', 'None', 190.00, 120.00, 310.00, 'delivery', '2025-01-28 17:28:06'),
(18, 'fcea6c12dd2fbe5e', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":1,\"price\":190,\"total\":\"190.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":44,\"id\":\"28\"}]', 'cod', 'None', 190.00, 120.00, 310.00, 'pending', '2025-01-26 17:28:22'),
(19, 'ed0fa1fe5760bcea', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Feet\\/Neck\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/chickenfeet,neck.jpg\",\"stocks\":47,\"id\":\"24\"}]', 'cod', 'None', 130.00, 120.00, 250.00, 'pending', '2025-01-28 17:29:10'),
(20, 'ad751bc0ee616740', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":49,\"id\":\"23\"}]', 'gcash', '512716281', 170.00, 120.00, 290.00, 'completed', '2025-01-28 17:51:27'),
(21, 'c6991b8316f339eb', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Argentina Corned Beef\",\"quantity\":1,\"price\":35,\"total\":\"35.00\",\"img\":\"..\\/static\\/img\\/argentinacornedbeef.jpg\",\"stocks\":47,\"id\":\"34\"},{\"name\":\"Mang Esting\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangesting.jpg\",\"stocks\":50,\"id\":\"40\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":49,\"id\":\"39\"},{\"name\":\"Reno\",\"quantity\":1,\"price\":32,\"total\":\"32.00\",\"img\":\"..\\/static\\/img\\/reno.jpg\",\"stocks\":50,\"id\":\"45\"}]', 'gcash', '551281289', 262.00, 120.00, 382.00, 'canceled', '2025-01-26 17:56:20'),
(22, '1378c2dab6dbbf1d', 7, 'Juliana', 'Dela Cruz', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Mang Esting\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangesting.jpg\",\"stocks\":49,\"id\":\"40\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":49,\"id\":\"38\"},{\"name\":\"Tender Juicy Hotdog\",\"quantity\":1,\"price\":195,\"total\":\"195.00\",\"img\":\"..\\/static\\/img\\/tenderjuicyhotdog.jpg\",\"stocks\":50,\"id\":\"19\"},{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":49,\"id\":\"36\"},{\"name\":\"CDO: Karne Norte\",\"quantity\":1,\"price\":28,\"total\":\"28.00\",\"img\":\"..\\/static\\/img\\/cdokarnenorte.png\",\"stocks\":50,\"id\":\"18\"}]', 'cod', 'None', 459.00, 120.00, 579.00, 'completed', '2025-01-29 03:09:08'),
(23, '922ee67f7f621f6f', 10, 'Fyke', 'Lleva', '09120912091', 'floterina@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"Chicken Intestine\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/chickenintestine.jpg\",\"stocks\":50,\"id\":\"25\"},{\"name\":\"Daily Quezo\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/dailyquezo.jpg\",\"stocks\":48,\"id\":\"36\"},{\"name\":\"Mang Kevin\",\"quantity\":1,\"price\":110,\"total\":\"110.00\",\"img\":\"..\\/static\\/img\\/mangkevin.jpg\",\"stocks\":50,\"id\":\"41\"}]', 'cod', 'None', 340.00, 120.00, 460.00, 'completed', '2025-02-02 04:31:43'),
(24, 'c65fe5ba6222000b', 10, 'Fyke', 'Lleva', '09120912091', 'floterina@gmail.com', 'Marilao, Bulacan', '[{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":50,\"id\":\"14\"},{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":44,\"id\":\"11\"},{\"name\":\"CDO: Karne Norte\",\"quantity\":1,\"price\":28,\"total\":\"28.00\",\"img\":\"..\\/static\\/img\\/cdokarnenorte.png\",\"stocks\":49,\"id\":\"18\"},{\"name\":\"Pancit Canton\",\"quantity\":1,\"price\":40,\"total\":\"40.00\",\"img\":\"..\\/static\\/img\\/pancitcanton.jpg\",\"stocks\":50,\"id\":\"44\"}]', 'cod', 'None', 313.00, 120.00, 433.00, 'completed', '2025-01-29 04:32:11'),
(25, '5ba05e5466af3946', 11, 'Sarah', 'Macaraig', '09120912091', 'sarah@gmail.com', 'Bocaue, Bulacan', '[{\"name\":\"Bigtime Cheese\",\"quantity\":1,\"price\":100,\"total\":\"100.00\",\"img\":\"..\\/static\\/img\\/bigtimecheese.jpg\",\"stocks\":46,\"id\":\"35\"},{\"name\":\"Luncheon Meat\",\"quantity\":1,\"price\":85,\"total\":\"85.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":48,\"id\":\"39\"},{\"name\":\"Tender Juicy Hotdog\",\"quantity\":1,\"price\":195,\"total\":\"195.00\",\"img\":\"..\\/static\\/img\\/tenderjuicyhotdog.jpg\",\"stocks\":49,\"id\":\"19\"}]', 'gcash', '5534123', 380.00, 120.00, 500.00, 'pending', '2024-01-25 04:50:13'),
(26, 'ede7e77bc323c5ef', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Wings\",\"quantity\":1,\"price\":190,\"total\":\"190.00\",\"img\":\"..\\/static\\/img\\/chickenwings.jpg\",\"stocks\":43,\"id\":\"28\"},{\"name\":\"Mega\",\"quantity\":1,\"price\":25,\"total\":\"25.00\",\"img\":\"..\\/static\\/img\\/mega.jpg\",\"stocks\":50,\"id\":\"42\"}]', 'cod', 'None', 215.00, 120.00, 335.00, 'completed', '2025-01-30 04:42:23'),
(27, 'b1577445f57a0eab', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":48,\"id\":\"23\"},{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":43,\"id\":\"11\"}]', 'gcash', '2345123123', 350.00, 120.00, 350.00, 'pending', '2024-01-22 09:17:43'),
(28, '7af1cb9324eded8a', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bocaue. Bulacan', '[{\"name\":\"Chicken Breast\",\"quantity\":1,\"price\":170,\"total\":\"170.00\",\"img\":\"..\\/static\\/img\\/chickenbrest.jpg\",\"stocks\":47,\"id\":\"23\"}]', 'gcash', '112121243', 170.00, 120.00, 170.00, 'completed', '2025-01-30 10:46:02'),
(29, 'ba71b070e5f2d682', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bulacan, Plaridel, Banga 1st, Block 8 Lot 9', '[{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":42,\"id\":\"11\"}]', 'cod', 'None', 180.00, 120.00, 180.00, 'pending', '2025-01-27 01:30:46'),
(30, '420e49027cab0c7f', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bulacan, Plaridel, Banga 1st, Block 8 Lot 9', '[{\"name\":\"CDO: Idol Cheesedog\",\"quantity\":1,\"price\":180,\"total\":\"180.00\",\"img\":\"..\\/static\\/img\\/idolcheesedog.jpg\",\"stocks\":41,\"id\":\"11\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":1,\"price\":26,\"total\":\"26.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":48,\"id\":\"38\"}]', 'cod', 'None', 206.00, 120.00, 206.00, 'pending', '2025-01-28 01:45:45'),
(32, '20313287c6abf96d', 7, 'Juliana', 'Padrigon', '0912127612761', 'juliana@gmail.com', 'Bulacan, Plaridel, Santo Niño, Block 8 Lot 10', '[{\"name\":\"Luncheon Meat\",\"quantity\":5,\"price\":85,\"total\":\"425.00\",\"img\":\"..\\/static\\/img\\/luncheonmeat.jpg\",\"stocks\":46,\"id\":\"39\"},{\"name\":\"Chicken Feet\\/Neck\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/chickenfeet,neck.jpg\",\"stocks\":46,\"id\":\"24\"}]', 'cod', 'None', 555.00, 120.00, 555.00, 'completed', '2025-02-03 01:33:41'),
(33, '409d1bc86486b2ba', 9, 'Robert', 'Moore', '09871287761', 'robert@gmail.com', 'Bulacan, Plaridel, Banga 1st, Block 8 Lot 9', '[{\"name\":\"CDO: Young Pork Tocino\",\"quantity\":1,\"price\":65,\"total\":\"65.00\",\"img\":\"..\\/static\\/img\\/youngporktocino.png\",\"stocks\":49,\"id\":\"14\"},{\"name\":\"Hunt Pork and Beans\",\"quantity\":2,\"price\":26,\"total\":\"52.00\",\"img\":\"..\\/static\\/img\\/huntporkandbeans.jpg\",\"stocks\":46,\"id\":\"38\"},{\"name\":\"CDO: Karne Norte\",\"quantity\":1,\"price\":28,\"total\":\"28.00\",\"img\":\"..\\/static\\/img\\/cdokarnenorte.png\",\"stocks\":48,\"id\":\"18\"}]', 'cod', 'None', 145.00, 120.00, 145.00, 'completed', '2025-02-03 09:24:01'),
(34, 'f22cd364b9ed4749', 13, 'Janes', 'Mary', '0912091209', 'jane@gmail.com', 'Bulacan, Plaridel, Bulihan, Block 10 Lot 1, Pagaasa Subdivision', '[{\"name\":\"Chicken Breast\",\"quantity\":2,\"price\":170,\"total\":\"340.00\",\"img\":\"..\\/static\\/img\\/istockphoto-93456470-612x612.jpg\",\"stocks\":44,\"id\":\"23\"},{\"name\":\"Mega\",\"quantity\":1,\"price\":25,\"total\":\"25.00\",\"img\":\"..\\/static\\/img\\/mega.jpg\",\"stocks\":49,\"id\":\"42\"},{\"name\":\"Chicken Intestine\",\"quantity\":1,\"price\":130,\"total\":\"130.00\",\"img\":\"..\\/static\\/img\\/instestine-e1705753502451.jpg\",\"stocks\":49,\"id\":\"25\"}]', 'gcash', 'ASD0912091209', 495.00, 120.00, 495.00, 'completed', '2025-02-03 12:53:24');

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
(11, 'CDO: Idol Cheesedog', '', 180, 40, 'idolcheesedog.jpg', 'Frozen'),
(12, 'CDO: Pork Longganisa', '', 75, 50, 'porklongganisa.jpg', 'Frozen'),
(13, 'CDO: Ulam Burger', '', 60, 49, 'ulamburger.png', 'Frozen'),
(14, 'CDO: Young Pork Tocino', '', 65, 48, 'youngporktocino.png', 'Frozen'),
(15, 'CDO: Big Time Footlong', '', 175, 49, 'cdobigtimefootlong.jpeg', 'Frozen'),
(16, 'CDO: Cornbeef', '', 50, 48, 'cdocornbeef.jpeg', 'Frozen'),
(17, 'CDO: Sweetham', '', 85, 50, 'cdosweetham.png', 'Frozen'),
(18, 'CDO: Karne Norte', '', 28, 47, 'cdokarnenorte.png', 'Frozen'),
(19, 'Tender Juicy Hotdog', '', 195, 48, 'tenderjuicyhotdog.jpg', 'Frozen'),
(20, 'Pampanga\'s Best Sweetham', '', 65, 50, 'pampangasbestsweetham.jpeg', 'Frozen'),
(23, 'Chicken Breast', '', 170, 42, 'istockphoto-93456470-612x612.jpg', 'Chicken'),
(24, 'Chicken Feet', '', 130, 45, 'raw-chicken-feet-883127.png', 'Chicken'),
(25, 'Chicken Intestine', '', 130, 48, 'instestine-e1705753502451.jpg', 'Chicken'),
(26, 'Chicken Legs', '', 200, 50, 'istockphoto-1177903289-612x612.jpg', 'Chicken'),
(27, 'Chicken Liver', '', 200, 49, 'intestine.jpg', 'Chicken'),
(28, 'Chicken Wings', '', 190, 42, 'chicken-wings_600x.png', 'Chicken'),
(29, 'Whole Chicken', '', 180, 49, 'whole.png', 'Chicken'),
(34, 'Argentina Corned Beef', '', 35, 46, 'argentinacornedbeef.jpg', 'Grocery'),
(35, 'Bigtime Cheese', '', 100, 45, 'bigtimecheese.jpg', 'Grocery'),
(36, 'Daily Quezo', '', 100, 47, 'dailyquezo.jpg', 'Grocery'),
(37, 'Hekaido', '', 26, 49, 'hekaido.jpg', 'Grocery'),
(38, 'Hunt Pork and Beans', '', 26, 44, 'huntporkandbeans.jpg', 'Grocery'),
(39, 'Luncheon Meat', '', 85, 41, 'luncheonmeat.jpg', 'Grocery'),
(40, 'Mang Esting', '', 110, 48, 'mangesting.jpg', 'Grocery'),
(41, 'Mang Kevin', '', 110, 49, 'mangkevin.jpg', 'Grocery'),
(42, 'Mega', '', 25, 48, 'mega.jpg', 'Grocery'),
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
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
