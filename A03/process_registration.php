<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "";
    $db_name = "assignment3";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $title = $_POST["title"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $newsletter = isset($_POST["newsletter"]) ? 1 : 0;

    // Check for empty fields
    $required_fields = ["title", "first_name", "last_name", "street", "city", "province", "postal_code", "country", "phone", "email"];
    $errors = [];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The $field field is required.";
        }
    }

    if (!empty($errors)) {
        // Display errors and repopulate the form
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        include "registration_form.html";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO registered_users (title, first_name, last_name, street, city, province, postal_code, country, phone, email, newsletter)
                VALUES ('$title', '$first_name', '$last_name', '$street', '$city', '$province', '$postal_code', '$country', '$phone', '$email', $newsletter)";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>
