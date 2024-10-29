-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS my_db;

-- Use the database
USE my_db;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Create another table as an example
CREATE TABLE IF NOT EXISTS other_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Create MySQL user and give it access to the database
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON my_db.* TO 'user'@'%';
FLUSH PRIVILEGES;
