<?php
include ('db_connect.php');


// retrieve last names
$query = "SELECT last_name FROM assignment3.registered_users";
$result = $mysqli->query($query);

$last_name_array = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $last_name_array[] = $row["last_name"];
    }

    // Sort alphabetically
    sort($last_name_array);

    // Display sorted last names
    foreach ($last_name_array as $last_name) {
        echo $last_name . "<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$mysqli->close();
?>
