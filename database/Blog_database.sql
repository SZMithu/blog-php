-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

CREATE DATABASE IF NOT EXISTS `Blog`;


--
-- Table structure for table `blogs`
--
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
)

--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext,
  `password` tinytext NOT NULL,
  `image` tinytext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Table structure for table `comments`
--
CREATE TABLE comments (
	id int(10) PRIMARY KEY AUTO_INCREMENT,
	blog_id int(10) NOT NULL,
  user_name varchar(55) NOT NULL,
	comment text NOT NULL,
  comment_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Table structure for table `replays`
--
CREATE TABLE replys (
    id int NOT NULL AUTO_INCREMENT,
    comment_id int NOT NULL,
    blog_id int NOT NULL,
    reply text NOT NULL,
    PRIMARY KEY (id),
    reply_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (comment_id) REFERENCES comments(id)
);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--add foreign key 
ALTER TABLE blogs
ADD FOREIGN KEY (user_id) REFERENCES users(id);

--AUTO_INCREMENT for table `blogs`
ALTER TABLE `blogs`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

