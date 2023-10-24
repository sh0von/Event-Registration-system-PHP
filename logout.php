<?php
// Start the session to access session variables
session_start();

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to a logged-out page or the login page
header("Location: login.php"); // Change the destination as needed
exit();
?>
