<?php
session_start();

// Check if the user is authenticated
if (isset($_SESSION['user_id']) && isset($_SESSION['session_id'])) {
   
    echo "Welcome, User " . $_SESSION['user_id'];
} else {
    // User is not authenticated, redirect to the login page
    header("Location: login.html");
    exit;
}
?>
