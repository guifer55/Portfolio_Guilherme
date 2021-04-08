-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 11:33 PM
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
-- Database: `guilherme_portfolio`
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
  `posted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blog_category_fk` int(11) NOT NULL,
  `teaser` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image_path`, `title`, `content`, `posted_at`, `blog_category_fk`, `teaser`) VALUES
(2, './assets/img/blog1.jpg', 'Why become a Web Developer?', '<p>The primary layout of the job market for a developer is already quite diversified. There are job opportunities as an applications developer, gaming, multimedia specialist, software tester, among others. But this is far from an exhaustive list, no one denies the expansion of the sector. We can easily attribute that to the fast-growing use of smartphones, as well as the steady growth of online services and products available. It is also quite interesting to read what (Wayner, 2019) has to say about predictions for the field: &ldquo;Despite the predictions, the command line and the text-based programming languages just won&#39;t die. If anything, programmers seem to love typing more than ever and the latest crazes seem to be all text.&rdquo;</p>\r\n\r\n<p>According to the Canadian Occupational Projections System, projections undoubtedly show that labor demand for developers is higher than the actual supply readily available, and the labor market for the area is expected to reach a balance only in 2026 (COPS, 2017).This data certainly reflects a positive outlook for graduates in the area, and also gives them a chance to choose between the numerous prospects of the industry.</p>\r\n', '2021-01-28 01:28:59', 4, '<p>The primary layout of the job market for a developer is already quite diversified. There are job opportunities as an applications developer, gaming, multimedia specialist, software tester, among others. But this is far from an exhaustive list, no one denies the expansion of the sector. We can easily attribute that to the fast-growing use of smartphones, as well as the steady growth of online services and products available. </p>\r\n'),
(6, 'assets/img/accessmod.jpg', 'Most Used Access Modifiers in C#', '<p>This article is a brush of the most commonly used access modifiers in the C# language.</p>\r\n\r\n<p>Public -&gt; the keyword allows us to expose all of its member variables and methods outside the class scope. We can get access anywhere inside the program.</p>\r\n\r\n<p>Protected -&gt; linked to a method or property where class members can be accessed only by classes inherited from the present class.</p>\r\n\r\n<p>Private -&gt; the keyword allows us to hide or preserve the member variables and methods from other member functions or class objects.</p>\r\n', '2021-03-01 03:35:55', 2, '<p>This article is a brush of the most commonly used access modifiers in the C# language.</p>\r\n<p>Public -&gt; the keyword allows us to expose all of its member variables and methods outside the class scope. We can get access anywhere inside the program.</p> <p>Private -&gt; the keyword allows us to hide or preserve the member variables and methods from other member functions or class objects.</p>'),
(7, 'assets/img/java.png', 'Exceptions and Errors Java', '<p>Just a basic explanation to the differences between Exceptions and Errors in Java.</p>\r\n\r\n<p><strong>Exceptions :</strong></p>\r\n\r\n<p>Exceptions are the conditions that occur at runtime and may cause the termination of program. But they are recoverable using try, catch and throw keywords. We can have checked exceptions, which are met at compile time, and&nbsp;unchecked exceptions, which is met by the&nbsp;compiler at runtime.</p>\r\n\r\n<p><strong>Errors :&nbsp;</strong></p>\r\n\r\n<p>Errors are the conditions which cannot get recovered by any handling techniques. It is bound to cause termination of the program in an abnormal way. We can only have unchecked errors, and they happen at runtime.</p>\r\n', '2021-03-08 02:59:52', 2, '<p>Just a basic explanation to the differences between Exceptions and Errors in Java.</p>\r\n\r\n<p><strong>Exceptions :</strong></p>\r\n\r\n<p>Exceptions are the conditions that occur at runtime and may cause the termination of program. But they are recoverable using try, catch and throw keywords. We can have checked '),
(8, 'assets/img/flutter.png', 'Widgets are fundamental for Flutter.', '<p>I found out while learning flutter the power of widgets. They&nbsp;affect and control the view and interface to an app. Widgets might as well&nbsp;be the most important part of mobile apps.</p>\r\n\r\n<p>&nbsp;Flutter presents a new structure that includes widgets that look and feel good, are fast, and are customizable and extensible.</p>\r\n\r\n<p>Each element on a screen of the Flutter app is a widget. The view of the screen completely depends upon the choice and sequence of the widgets used to build the app. And the structure of the code of an app is a tree of widgets.&nbsp;</p>\r\n\r\n<p>Building the UI out of widgets is quite brilliant. I look forward working with Flutter again.</p>\r\n', '2021-03-08 03:36:54', 3, '<p>I found out while learning flutter the power of widgets. They&nbsp;affect and control the view and interface to an app. Widgets might as well&nbsp;be the most important part of mobile apps.</p>\r\n\r\n<p>&nbsp;Flutter presents a new structure that includes widgets that look and feel good, are fast, and are customizable and extensible.</p>'),
(9, 'assets/img/htmlcss.png', 'What I learned from Web Design.', '<p>Considering Web Design as a subset of web development is an interesting approach through the perspective of applying your artistic vision and creativity to an otherwise highly logical field.</p>\r\n\r\n<p>from a broad view perspective, the work of a designer focus on creating layouts, typography, colors, and other resources through the use of specific programming languages such as HTML and CSS. According to the level of mastery of these languages, a designer can create an aesthetically pleasing interface for users. In the `90s when designing was on its primordial steps, websites had plain text and colors and were overall not soft on the eyes. Most of them seemed unappealing and even dull.</p>\r\n\r\n<p>Today the main focus seems to be attracting the attention of the user through beautiful layouts, well-constructed and visible navigation links. The better-looking is the website or application, greater is the time the user spends navigating on.</p>\r\n', '2021-03-08 03:54:22', 1, '<p>Considering Web Design as a subset of web development is an interesting approach through the perspective of applying your artistic vision and creativity to an otherwise highly logical field.</p>\r\n<p>from a broad view perspective, the work of a designer focus on creating layouts, typography, colors, and other resources through the use of specific ield.</p>'),
(10, 'assets/img/full-stack.jpeg', 'Full-Stack Development.', '<p>Who is the professional considered to be a full-stack developer? This breed of developer is considered a &ldquo;jack of all trades&rdquo; , and it is a highly sought-after job candidate. The way to become a full-stack developer is learning key programming languages of the front-end(HTML, CSS, and Javascript), as well as back-end languages(SQL, Python, Ruby, and others). This type of professional is ideally well-versed with all the stages in software development.</p>\r\n\r\n<p>It is argued that today a competent professional must have an overall knowledge of both front and back-end languages because they are not apart at all. Other than being an expert on all programming languages and stages, every developer should have familiarity with all the layers in the industry.</p>\r\n', '2021-03-08 04:48:23', 4, '<p>Who is the professional considered to be a full-stack developer? This breed of developer is considered a &ldquo;jack of all trades&rdquo; , and it is a highly sought-after job candidate. The way to become a full-stack developer is learning key programming languages of the front-end(HTML, CSS, and Javascript), as well as back-end languages(SQL, Python, Ruby, and others). This type of professional is ideally well-versed with all the stages in software development.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `blog_skills`
--

CREATE TABLE `blog_skills` (
  `blog_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_skills`
--

INSERT INTO `blog_skills` (`blog_id`, `skill_id`) VALUES
(9, 1),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Web'),
(2, 'Desktop'),
(3, 'Mobile'),
(4, 'Other');

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `project_fk`, `blog_fk`) VALUES
(2, 'blackjack2.PNG', 4, NULL),
(3, 'blackjack3.PNG', 4, NULL),
(5, 'Poseidon1.PNG', 10, NULL),
(6, 'PoseidonMob.PNG', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` varchar(800) NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `project_category_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `image`, `video`, `project_category_fk`) VALUES
(4, 'BlackJack 21 OOP Project', '<p>This is a blackjack 21 game that I developed for my Object Oriented Programming class. The goal of blackjack is to beat the dealer&#39;s hand without going over 21.&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;We will have a dealer hand and a player hand. Each player starts with two cards.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;The following are the choices available to the player:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &bull;&nbsp;&nbsp; &nbsp;Stand: Player stands pat with his cards.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &bull;&nbsp;&nbsp; &nbsp;Hit: Player draws another card (and more if he wishes). If this card causes the player&#39;s total points to exceed 21 then he loses.</p>\r\n', 'blackjack1.PNG', 'X6pplfJYt3s', 2),
(10, 'Poseidon Palace Web Design Project', '<p>This is my term project for Responsive Web Design. It was an individual project built from scratch designed to apply the contents taught at this course.</p>\r\n\r\n<p>We made use of HTML, CSS and SASS alone to build a website that would be responsive to all sorts of devices, may they be mobile, tablet or desktop. We were not allowed to use Bootstrap at this point.</p>\r\n', 'Poseidon2.PNG', 'VBOENeHKTg4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `project_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_skills`
--

INSERT INTO `projects_skills` (`project_id`, `skill_id`) VALUES
(4, 6),
(4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `description` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `description`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'Bootstrap'),
(4, 'ASP.Net'),
(5, 'PHP'),
(6, 'C#'),
(7, 'Java'),
(8, 'Javascript'),
(9, 'SQL'),
(10, 'Flutter'),
(11, 'Android'),
(12, 'iOS'),
(13, 'OOP');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id_category` (`blog_category_fk`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id_category` (`project_category_fk`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_id_category` FOREIGN KEY (`blog_category_fk`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `project_id_category` FOREIGN KEY (`project_category_fk`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
