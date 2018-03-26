-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2018 at 06:12 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Javascript'),
(3, 'Bootstraps'),
(9, 'Example Category'),
(10, 'OOP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`, `post_views`) VALUES
(8, 2, 'Edwin', 'Edwin', '2018-03-10', 'image_4.jpg', '<p>adfasdfsdfa</p>', 'edwin,edwin,edwin', 0, 'published', 1),
(9, 2, 'almost done', 'mike', '2018-03-10', 'image_1.jpg', '<p>adfafd</p>', 'wom.win', 0, 'published', 0),
(10, 2, 'Edwin', 'Edwin', '2018-03-10', 'image_4.jpg', '', 'edwin,edwin,edwin', 0, 'published', 0),
(11, 2, 'almost done', 'mike', '2018-03-10', 'image_1.jpg', '', 'wom.win', 0, 'published', 0),
(12, 2, 'Edwin', 'Edwin', '2018-03-10', 'image_4.jpg', '', 'edwin,edwin,edwin', 0, 'published', 0),
(13, 2, 'almost done', 'mike', '2018-03-10', 'image_1.jpg', '', 'wom.win', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `first_name`, `last_name`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(9, 'edwin', '$2y$10$iusesomecrazystrings2uQyfOt3cO7zfeGMo2DU3oGHWa0AA/VvG', 'Edwin', '1234', 'edwin@email.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(10, 'drake', '$2y$10$iusesomecrazystrings2uIGOyryZiZFLjH04rgRpI.YJFc0pZxSm', '', '', 'drake@email.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(11, 'drakes', '$2y$10$iusesomecrazystrings2uGtDpLi/sz8giU0Qqyz0jXbOCxzug3S6', '', '', 'drakes@email.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(14, 'mike', '$2y$12$gkBi2QE.ckCrnSMvMr6eD.QMt6yinHkgp9k26pSK5Is.qYC4U8y7y', '', '', 'mike@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(15, 'james', '$2y$10$msztncG5Yd6Gl3sHBmrAuOO6uN/FlR9feDF72bD6GNW8FO..ofp6e', 'james', 'james', 'james@email.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'b62dc3ecdfd83b3a738bb23863d86e13', 1521087032),
(2, '2e1b5248c1fdb274ecf4ebc5fdf05122', 1521259333),
(3, '269dafdce8b3b07b65b0095e1da7bd89', 1522033199);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
