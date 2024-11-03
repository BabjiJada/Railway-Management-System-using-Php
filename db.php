<link rel="stylesheet" href="style.css" />
<?php
$servername = "localhost";
$username = "Babji";
$password = "Babji@155";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 
?>
