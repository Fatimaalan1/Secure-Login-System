<?php
session_start(); // Start the session

// Check if the session is initialized
if (isset($_SESSION['username'])) {
    // Destroy the session
    session_destroy(); 
}

// Redirect to the login page
require 'config.php'; // Include your redirect function
redirect('login.php'); // Redirect to login page
?>
