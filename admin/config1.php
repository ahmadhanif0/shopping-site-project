<?php
// $hostname = "http://localhost/shopping-project"; // Define the hostname

$servername = "localhost"; // Server name or IP address
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "shopping_db"; // Database name

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$base_url = "http://localhost/shopping-project/";
