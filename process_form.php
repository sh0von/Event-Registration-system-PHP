<?php
require 'config.inc.php'; // Include your database credentials

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['department']) && isset($_POST['batch']) && isset($_POST['cuet_id']) && isset($_POST['phone']) && isset($_POST['address'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Retrieve data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $cuet_id = $_POST['cuet_id'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Check if email or CUET ID already exists in the database
    $emailExists = false;
    $cuetIdExists = false;

    $checkEmailQuery = "SELECT * FROM user_information WHERE email = ?";
    $checkCuetIdQuery = "SELECT * FROM user_information WHERE cuet_id = ?";

    $emailStmt = $pdo->prepare($checkEmailQuery);
    $emailStmt->execute([$email]);
    $emailResult = $emailStmt->fetch();

    $cuetIdStmt = $pdo->prepare($checkCuetIdQuery);
    $cuetIdStmt->execute([$cuet_id]);
    $cuetIdResult = $cuetIdStmt->fetch();

    if ($emailResult) {
        $emailExists = true;
    }

    if ($cuetIdResult) {
        $cuetIdExists = true;
    }

    if ($emailExists) {
        echo '<div class="alert alert-danger" role="alert">Email already exists. Please use a different email.</div>';
    } elseif ($cuetIdExists) {
        echo '<div class="alert alert-danger" role="alert">CUET ID already exists. Please use a different CUET ID.</div>';
    } else {
        // Insert the data into the database
        $insertQuery = "INSERT INTO user_information (name, email, department, batch, cuet_id, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->execute([$name, $email, $department, $batch, $cuet_id, $phone, $address]);

        // Close the database connection
        $pdo = null;

        // Display a success message
        echo '<div class="alert alert-success" role="alert">Form submitted successfully!</div>';
    }
} else {
    // Handle invalid form submission
    echo '<div class="alert alert-danger" role="alert">Invalid form submission. Please try again.</div>';
}
?>
