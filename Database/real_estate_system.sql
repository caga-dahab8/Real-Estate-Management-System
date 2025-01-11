-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 07:38 AM
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
-- Database: `real_estate_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `user_email`, `property_id`, `message`, `created_at`) VALUES
(1, 'suleymaansaid9@gmail.com', 1, 'i want this house', '2025-01-07 21:29:22'),
(2, 'suleymaansaid9@gmail.com', 3, 'waa rabaa', '2025-01-08 07:22:23'),
(3, 'suleymaansaid9@gmail.com', 3, 'kan rabaa', '2025-01-08 12:21:34'),
(4, 'suleymaansaid9@gmail.com', 6, 'kan rabaa', '2025-01-09 17:01:00'),
(5, 'suleymaansaid9@gmail.com', 7, 'kanaa rabaa', '2025-01-09 20:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('rent','sale') NOT NULL,
  `assigned_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `price`, `location`, `description`, `image`, `created_at`, `type`, `assigned_to`) VALUES
(1, 'dddd', 12.00, 'Mogadishu', 'fkukhfj', '01f3c7c559fc4aeba79e2de973b4a1fc.jpg', '2025-01-03 06:18:34', 'rent', 5),
(3, 'bakaro', 300.00, 'Mogadishu', 'for rent', 'IMG-20211211-WA0006.jpg', '2025-01-08 07:20:58', 'rent', NULL),
(6, 'Fadumo tower', 500.00, 'warta nabada', 'waxoo ku yaala cali kamin', '1.jpg', '2025-01-09 17:00:28', 'rent', 6),
(7, 'Fadumo tower', 500.00, 'warta nabada', 'waxaan u rabaa kiro', '3.jpg', '2025-01-09 19:54:39', 'rent', NULL),
(8, 'suleiman tower', 500.00, 'warta nabada', 'hhhffgfhh', '2.jpg', '2025-01-09 20:00:21', 'sale', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `reset_token`) VALUES
(2, 'Admin', 'admin@example.com', '$2y$10$eImG6kD8AtgFSUuF.NnpCuGkJ1abUZONfg6MtqKm0JjJr8XY5Pvz2', 'admin', '2025-01-02 19:30:27', NULL),
(3, 'suleiman', 'admin@gmail.com', '$2y$10$uARXwk.0kl0HD9lvrhkPZ.Rl/CLf7Ed9FPcZvSnE2nZHVk/TzRrxC', 'admin', '2025-01-02 19:49:22', 'ad2d94b49b4fc8b28d2f8034bde3e600'),
(4, 'suleiman mukhtar said', 'suleymaansaid9@gmail.com', '$2y$10$T1ptYpYpSH.j23fGaSnbO.0kObfvDY0RCbCM17Q.IH8hF4wovTQBu', 'user', '2025-01-07 21:11:55', '09d5fbe0adeb56acbb13e0cf3d5480a4'),
(5, 'Kunciil Abdiwahab Hassan', 'kuncil@gmail.com', '$2y$10$VnPRPQDG1WM63NVIQgoBx.y904Z4JQaDX/c49g1azubJLcC1ys2wy', 'user', '2025-01-09 15:12:18', NULL),
(6, 'Abdikarin Abdulahi Mohamed', 'abdi@gmail.com', '$2y$10$IguuJ/xW3rq7Rk3mp4sXKuZApI1DcO7JG4wK7WB.2rbYuNlkyHNiy', 'user', '2025-01-09 15:27:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `inquiries_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
