<?php
session_start(); // Start a session to track user login status

$servername = "127.0.0.1"; // Database server
$username = "admin"; // Database username
$password = "34567890"; // Database password
$dbname = "prestige_motors"; // Database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from form
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    // Check if the username exists in the database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user record
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($user_password, $user['password'])) {
            // Password is correct, start the session
            $_SESSION['username'] = $user_username;
            echo "Login successful! Welcome, " . $_SESSION['username'];
            // Redirect to a dashboard or homepage
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account found with that username.";
    }
    $stmt->close();
}

$conn->close();
?>
