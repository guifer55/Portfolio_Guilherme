-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 04:53 AM
-- Server version: 5.7.32-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_gui`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `title` varchar(90) NOT NULL,
  `content` text NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image_path`, `title`, `content`, `posted_at`) VALUES
(2, './assets/img/blog1.jpg', 'Why become a ?', '<p>The primary layout of the job market for a developer is already quite diversified. There are job opportunities as an applications developer, gaming, multimedia specialist, software tester, among others. But this is far from an exhaustive list, no one denies the expansion of the sector. We can easily attribute that to the fast-growing use of smartphones, as well as the steady growth of online services and products available. It is also quite interesting to read what (Wayner, 2019) has to say about predictions for the field: &ldquo;Despite the predictions, the command line and the text-based programming languages just won&#39;t die. If anything, programmers seem to love typing more than ever and the latest crazes seem to be all text.&rdquo;</p>\r\n\r\n<p>According to the Canadian Occupational Projections System, projections undoubtedly show that labor demand for developers is higher than the actual supply readily available, and the labor market for the area is expected to reach a balance only in 2026 (COPS, 2017).This data certainly reflects a positive outlook for graduates in the area, and also gives them a chance to choose between the numerous prospects of the industry.</p>\r\n', '2021-01-28 01:28:59'),
(6, 'assets/img/accessmod.jpg', 'Most Used Access Modifiers in C#', 'Public -> the keyword allows us to expose all of its member variables and methods outside the class scope. We can get access anywhere inside the program.\r\nProtected -> linked to a method or property where class members can be accessed only by classes  inherited from the present class\r\nPrivate -> the keyword allows us to hide or preserve the member variables and methods from other member functions or class objects.\r\n', '2021-03-01 03:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `blog_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_skills`
--

CREATE TABLE `blog_skills` (
  `blog_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `project_fk` int(11) DEFAULT NULL,
  `blog_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` varchar(600) NOT NULL,
  `file` varchar(400) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `file`, `image`, `video`) VALUES
(1, 'Blackjack Game', 'BlackJack project developed by Guilherme Ferreira for my C# Object Oriented Programming class', '', 'assets\\img\\portfolio\\blackjack1.png', 'https://youtu.be/X6pplfJYt3s');

-- --------------------------------------------------------

--
-- Table structure for table `projects_categories`
--

CREATE TABLE `projects_categories` (
  `project_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `project_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `description` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`) VALUES
(1, 'Guilherme', 'Ferreira', 'Guifer', 'om3shiv3', 'gui.ferreiradev@gmail.com'),
(2, 'Delon', 'Van de Venter', 'delon', 'secret', 'delon.vandeventer@nbcc.ca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD KEY `blog_id_key3` (`blog_id`),
  ADD KEY `category_id_key2` (`category_id`);

--
-- Indexes for table `blog_skills`
--
ALTER TABLE `blog_skills`
  ADD KEY `blog_id_key2` (`blog_id`),
  ADD KEY `skill_id_key2` (`skill_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id_key` (`blog_fk`),
  ADD KEY `project_key1` (`project_fk`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD KEY `project_id_key2` (`project_id`),
  ADD KEY `category_id_key` (`category_id`);

--
-- Indexes for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD KEY `project_id_key` (`project_id`),
  ADD KEY `skill_id_key` (`skill_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_id_key3` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `category_id_key2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `blog_skills`
--
ALTER TABLE `blog_skills`
  ADD CONSTRAINT `blog_id_key2` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `skill_id_key2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `blog_id_key` FOREIGN KEY (`blog_fk`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `project_key1` FOREIGN KEY (`project_fk`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects_categories`
--
ALTER TABLE `projects_categories`
  ADD CONSTRAINT `category_id_key` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `project_id_key2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD CONSTRAINT `project_id_key` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `skill_id_key` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
