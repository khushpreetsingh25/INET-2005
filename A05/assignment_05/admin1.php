<?php
// Retrieve the username from the URL parameter
if (isset($_GET['username'])) {
    $username = $_GET['username'];
} else {
    // Handle the case where the username parameter is missing.
    $username = "Unknown";
}

// Display the username
echo "Welcome, $username ";
?>
