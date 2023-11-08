<?php
// Connect to the database 
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$database = "unit_7";
$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];


// Check if the username and password match a record in the users table
$query = "SELECT user_id FROM users WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
    // Successful login
    $user = $result->fetch_assoc();
    $user_id = $user['user_id'];

    // Retrieve the username associated with the user_id
    $username_query = "SELECT username FROM users WHERE user_id = '$user_id'";
    $username_result = $mysqli->query($username_query);

    if ($username_result->num_rows == 1) {
        $username_row = $username_result->fetch_assoc();
        $username = $username_row['username'];
    } else {
        // Handle the case where the username is not found.
        $username = "Unknown";
    }

    // Generate a session ID (you can use PHP's built-in session handling or a library)
    $session_id = session_id();

    // Set user_id and session_id as session variables
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['session_id'] = $session_id;

    // Store the session information in the login_sessions table
    $last_access_time = time();
    $insert_query = "INSERT INTO login_sessions (user_id, session_id, last_access_time) VALUES ('$user_id', '$session_id', '$last_access_time')";
    $mysqli->query($insert_query);

    // Redirect to admin.php and pass the username as a parameter
    header("Location: admin.php?username=" . urlencode($username));
    exit;
} else {
    // Login failed, redirect back to the login page
    header("Location: login1.html");
    exit;
}

$mysqli->close();
?>
