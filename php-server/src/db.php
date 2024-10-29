<?php
// db.php

// Database configuration
$host = 'db'; // This should match the service name in your docker-compose.yml
$username = 'user'; // This should match the MYSQL_USER in your .env
$password = 'your_secure_password'; // This should match MYSQL_PASSWORD in your .env
$database = 'my_db'; // This should match MYSQL_DATABASE in your .env

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

