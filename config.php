<?php
// Database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = '';

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
//     echo"Connection stablished Successfully!";
// }

mysqli_query($conn,"USE myDB");

?>