<?php
// Database configuration mysql -h my-sandbox-app-db.mysql.database.azure.com -u sandbox_admin -p
$dbHost = 'vnet-simple-database.mysql.database.azure.com';
$dbUsername = 'vnetadmin';
$dbPassword = 'Password@123';
$dbName = 'simple-db';
print "$dbHost, $dbUsername, $dbPassword, $dbName"; 
ini_set ('error_reporting', E_ALL);
ini_set ('display_errors', '1');
error_reporting (E_ALL|E_STRICT);

$db = mysqli_init();
mysqli_options ($db, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

$db->ssl_set(NULL,NULL, "DigiCertGlobalRootCA.crtVnet.pem", NULL, NULL);
$linkVnet = mysqli_real_connect($db, "vnet-simple-database.mysql.database.azure.com", "vnetadmin", "Password@123", "simple-db", 3306, MYSQLI_CLIENT_SSL);
if (!$linkVnet)
{
    die ('Connect error (' . mysqli_connect_errno() . '): ' . mysqli_connect_error() . "\n");
} else {
    $sql = "CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, profession VARCHAR(50) NOT NULL )";
    $sql = "INSERT INTO users ('name', 'profession') VALUES ('firstname lastname', 'professor')";
    //$sql = "SELECT * from users";
    $res = $db->query($sql);
    print_r ($res);
    $db->close();
}
// Create a database connection
/*$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

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
mysqli_close($conn);*/
?>
