<?php
include ('../server/db.php');

if ($conn) {
    echo "Connected successfully!";
} else {
    echo "Connection failed: " . $conn->connect_error;
}
?>
