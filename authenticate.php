<?php
// Include your database connection code here
$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "form";

$connection = new mysqli($host, $db_username, $db_password, $db_name);

if ($connection->connect_error) {
   die("Connection failed: " . $connection->connect_error);
}

// Get the submitted username and password
$username = $_POST['username'];
$password = md5($_POST['password']); // Hash the password using MD5

// Query to check admin credentials
$query = "SELECT * FROM admin_credentials WHERE username = '$username' AND password = '$password'";
$result = $connection->query($query);



if ($result->num_rows == 1) {
    // Successful login
    session_start();
    $_SESSION['authenticated'] = true;
    header("Location: admin.php");
} else {
    // Failed login
    header("Location: login.php?error=1"); // Set the error parameter
}

$connection->close();