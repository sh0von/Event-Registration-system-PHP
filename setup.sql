-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS `form`;

-- Switch to the 'form' database
USE `form`;

-- Create the 'admin_credentials' table
CREATE TABLE `admin_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) 
-- Create the 'user_information' table
CREATE TABLE `user_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  `cuet_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) 