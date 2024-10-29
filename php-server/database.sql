CREATE DATABASE IF NOT EXISTS my_db;

USE my_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user'
);

INSERT INTO users (username, password, role) VALUES 
('jana', '123', 'admin');

INSERT INTO users (username, password, role) 
VALUES 
('user1', 'password1', 'user'),
('user2', 'password2', 'user'),
('user3', 'password3', 'user'),
('testAdmin', 'testadmin123', 'admin');