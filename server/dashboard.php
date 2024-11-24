<?php
session_start();

if (!isset($_SESSION['username'])) {
    // If user is not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

echo "Welcome, " . $_SESSION['username'] . "! You are logged in.";
?>
