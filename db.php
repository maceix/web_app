<?php
$host = 'database-2.cluster-cn88cg4iybdm.us-east-1.rds.amazonaws.com';
$dbname = 'database-2';
$username = 'admin'; // Default XAMPP MySQL username
$password = '';     // Default XAMPP MySQL password (empty)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
