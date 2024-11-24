<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}
include ('../server.php/db.php');

// Fetch vehicles
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home -   Prestige Motors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="logout.php">Logout</a>
    </header>

    <section id="vehicles">
        <h2>Our Vehicles</h2>
        <div class="vehicle-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="vehicle-card">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Price: $<?php echo $row['price']; ?></p>
                    <button onclick="openModal('<?php echo $row['name']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['image']; ?>')">View Details</button>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</body>
</html>
