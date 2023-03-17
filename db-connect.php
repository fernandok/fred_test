<?php
// Database configuration mysql -h my-sandbox-app-db.mysql.database.azure.com -u sandbox_admin -p
$dbHost = 'my-sandbox-app-db.mysql.database.azure.com';
$dbUsername = 'sandbox_admin';
$dbPassword = 'Password@123';
$dbName = 'sandbox_db';

// Create a database connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the user table
$sql = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    profession VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "User table created successfully";
} else {
    echo "Error creating user table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
