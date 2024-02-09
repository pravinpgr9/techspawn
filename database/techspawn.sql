-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 07:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techspawn`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `department`, `position`, `salary`, `hire_date`, `created_at`, `updated_at`) VALUES
(1, 'JohnTEST', 'Doe', 'john.doe@example.com', '123-456-7890', '123 Main St, City, Country', 'ISOFTWAREE', 'Software Engineer', 60000.00, '2023-01-15', '2024-02-08 09:34:29', '2024-02-09 04:39:47'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', '987-654-3210', '456 Elm St, City, Country', 'HR', 'HR Manager', 70000.00, '2022-05-20', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(4, 'Emily', 'Brown', 'emily.brown@example.com', '444-222-3333', '321 Pine St, City, Country', 'Marketing', 'Marketing Specialist', 58000.00, '2023-02-05', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(6, 'Sarah', 'Anderson', 'sarah.anderson@example.com', '777-888-9999', '654 Birch St, City, Country', 'Sales', 'Sales Representative', 55000.00, '2022-11-20', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(7, 'David', 'Martinez', 'david.martinez@example.com', '222-333-4444', '753 Cedar St, City, Country', 'Operations', 'Operations Manager', 72000.00, '2022-07-10', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(8, 'Jessica', 'Garcia', 'jessica.garcia@example.com', '666-777-8888', '852 Walnut St, City, Country', 'Finance', 'Financial Controller', 75000.00, '2022-09-25', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(9, 'Daniel', 'Wilson', 'daniel.wilson@example.com', '333-444-5555', '963 Spruce St, City, Country', 'IT', 'Software Developer', 58000.00, '2023-04-30', '2024-02-08 09:34:29', '2024-02-08 09:34:29'),
(12, 'Emily', 'Brown', 'emily.brow123n@example.com', '444-222-3333', '321 Pine St, City, Country', 'Marketing', 'Marketing Specialist', 58000.00, '2023-02-05', '2024-02-08 10:30:09', '2024-02-08 10:30:09'),
(14, 'Emily', 'Brown', 'emily.brow12113n@example.com', '444-222-3333', '321 Pine St, City, Country', 'Marketing', 'Marketing Specialist', 58000.00, '2023-02-05', '2024-02-08 10:31:10', '2024-02-08 10:31:10'),
(16, 'Emily', 'Brown', 'emily.789@example.com', '444-222-3333', '321 Pine St, City, Country', 'Marketing', 'Marketing Specialist', 58000.00, '2023-02-05', '2024-02-08 11:29:42', '2024-02-08 11:29:42'),
(19, 'Tamara', 'Vargas', 'tobo@mailinator.com', '+1 (146) 745-97', 'Cupidatat iure id er', 'Sequi quod assumenda', 'Sint commodi libero ', 0.00, '1973-02-20', '2024-02-08 15:56:39', '2024-02-08 15:56:39'),
(20, '44Emily', '55Brown', 'emily.1133@example.com', '444-222-3333', '321 Pine St, City, Country', 'Marketing', 'Marketing Specialist', 58000.00, '2023-02-05', '2024-02-08 16:24:34', '2024-02-09 03:48:25'),
(21, 'Bree', 'Hurley', 'bymob@mailinator.com', '+1 (566) 398-91', 'Quia dolorem earum a', 'Quibusdam cillum fac', 'Nisi ut veritatis qu', 0.00, '1999-02-13', '2024-02-08 16:27:29', '2024-02-08 16:27:29'),
(22, 'Mira', 'Sloan', 'koxape@mailinator.com', '+1 (793) 744-83', 'Voluptas ducimus co', 'Velit neque voluptat', 'Ut eiusmod aut id qu', 0.00, '1998-02-06', '2024-02-08 16:28:38', '2024-02-08 16:28:38'),
(23, 'Tasha', 'Reid', 'kogy@mailinator.com', '+1 (908) 806-55', 'Pariatur Unde dolor', 'Et quis omnis harum ', 'Consequatur quae fu', 0.00, '2013-08-27', '2024-02-08 16:40:42', '2024-02-08 16:40:42'),
(24, 'Boris', 'Joseph', 'kiqa@mailinator.com', '+1 (947) 969-37', 'Placeat voluptates ', 'Impedit voluptatem ', 'Quis adipisicing hic', 0.00, '1998-07-27', '2024-02-08 16:57:29', '2024-02-08 16:57:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
