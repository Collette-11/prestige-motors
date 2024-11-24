<?php
$servername = "127.0.0.1"; // Use your public IP address here
$username = "admin"; // Your live database username
$password = "34567890"; // Your live database password
$dbname = "prestige_motors"; // Your live database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_password = $_POST['password']; // Get the plain text password from the form
    $hashed_password = password_hash($user_password, PASSWORD_DEFAULT); // Hash the password

    $user_username = $_POST['username']; // Get the username

    // Insert the new user into the database with the hashed password
    $sql = "INSERT INTO users (username, password) VALUES ('$user_username', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

