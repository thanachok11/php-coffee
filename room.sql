-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 07:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` varchar(11) NOT NULL,
  `Room_remark` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `Room_remark`, `price`, `image`) VALUES
('R1', '1 bathroom, 1 bed, suitable for sleeping with a lover or acquaintance.', 2500, 'https://img.freepik.com/free-photo/comfortable-modern-bedroom-with-elegant-decoration-lighting-generative-ai_188544-7715.jpg?w=1800&t=st=1696853150~exp=1696853750~hmac=d18b07f7d120acc8d5a38932e7547aeb62a8552866b15233a0bba78b7402c4a0'),
('R2', 'Soft bed, natural view, ready to receive the morning sun.', 3000, 'https://img.freepik.com/free-psd/realistic-double-bedroom-with-furniture-big-windows_176382-285.jpg?w=1060&t=st=1696853255~exp=1696853855~hmac=a309c3aa849880fb8bf3e3078ffb28e3054b08056b2d3a49f889f90c7b524fc6'),
('R3', 'Teen style room There are shelves and lamps. The room looks comfortable to the eye.', 2200, 'https://img.freepik.com/free-photo/bedroom-interior_1098-15128.jpg?w=1380&t=st=1696848878~exp=1696849478~hmac=6d691e9e529554da106ef75cbddb95e70e260d10ebff30c15a231cc10ce67e63'),
('R4', 'Simple style room Suitable for working people with mountain views.', 2800, 'https://img.freepik.com/free-photo/comfortable-modern-bedroom-with-elegant-wood-headboard-generated-by-ai_24640-87460.jpg?t=st=1696848955~exp=1696852555~hmac=e93899dae766fc1c05c2089cec89ffa0d353ba2534f4e1fc0dfa36f6b15750af&w=1800'),
('R5', 'Small room suitable for living alone. Beautifully decorated and livable', 2200, 'https://img.freepik.com/free-photo/3d-rendering-beautiful-luxury-bedroom-suite-hotel-with-tv-shelf_105762-2077.jpg?w=1380&t=st=1696848927~exp=1696849527~hmac=ff07d257dee9036282640d421261669817ffaaa7dc17635c26d3fe121b72fb5b'),
('R6', 'A minimalist style room that looks good and has a price. The room is decorated in beautiful white.', 1700, 'https://img.freepik.com/free-photo/creative-fengshui-practice-bedroom-arrangement_23-2149135754.jpg?w=1380&t=st=1696854367~exp=1696854967~hmac=e4e5f596b8b388c85fb4c1ea2e3a9cd9bde917870801acbe6fd743569587f88e'),
('R7', 'Simple style room Beautifully decorated, natural, looks deep.', 3000, 'https://img.freepik.com/free-photo/poster-mockup-with-vertical-frame-empty-dark-blue-wall-bedroom-interior_41470-5135.jpg?w=900&t=st=1696854344~exp=1696854944~hmac=c451ba290204d25fbfd0182ff8f32f75ce09dd94197f7e6cd42176e31861cdc1'),
('R8', 'room of art Decorated with pictures showing beautiful art.', 3700, 'https://img.freepik.com/free-photo/modern-apartment-bedroom-comfortable-bed-near-window-generative-ai_188544-7709.jpg?w=1800&t=st=1696848983~exp=1696849583~hmac=23c90c82a4c0bc3fea935def92243323fdde7ba6cad9b6dde80276af125596fa'),
('R9', 'The room is decorated in the same tone as the wood. Looks simple but beautiful.', 3600, 'https://img.freepik.com/free-photo/3d-rendering-beautiful-luxury-bedroom-suite-hotel-with-tv_105762-2173.jpg?w=1380&t=st=1696849018~exp=1696849618~hmac=8182f230fd2bae7eea8202dc755e67da3a63cfc4d8ca14e4f2ea5d11bb0eae21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
