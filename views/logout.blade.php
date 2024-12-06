<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page or home page
header("Location: login.blade.php"); // Change this to your actual login page
exit();
?>