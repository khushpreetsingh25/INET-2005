<?php
include('db_connect.php');

$query = "SELECT user_id, first_name, last_name FROM assignment3.registered_users";
$result = $mysqli->query($query);

$all_users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_array = [
            'user_id' => $row['user_id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name']
        ];
        $all_users[] = $user_array;
    }

    // Loop and display the stored values for each user
    foreach ($all_users as $user) {
        echo "User ID: " . $user['user_id'] . "<br>";
        echo "First Name: " . $user['first_name'] . "<br>";
        echo "Last Name: " . $user['last_name'] . "<br><br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$mysqli->close();
?>
