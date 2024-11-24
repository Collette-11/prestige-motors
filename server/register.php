<?php
session_start();
include ('../server/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize username
    $password = $_POST['password']; // Get plain text password from form
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Insert into users table
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php"); // Redirect to login page after registration
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
