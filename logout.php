<?php
 if(isset($_POST['logout'])){
    session_start(); // Start the session (required on every page)
    session_unset(); // Unset all session variables and destroy session data (optional)
    session_destroy(); // Destroy the session (required)
    header('Location: login.php'); // Redirect user to login page after logging out
 }
?>