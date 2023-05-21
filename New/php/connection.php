<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elitelogisticsdb";

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>