<?php
$servername = "autosqaeni";
$username = "root";
$password = "extreme";
$dbname = "gcovDash";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
