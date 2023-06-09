<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $userType = $_POST['user-type'];
    $username = $_POST['username'];
    $mobile = $_POST['number'];
    $email = $_POST['Email'];
    $password = $_POST['password'];

    // Perform any necessary validation

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO phs (user_type, username, mobile, email, password) VALUES ('$userType', '$username', '$mobile', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}