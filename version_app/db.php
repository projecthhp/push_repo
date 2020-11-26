<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/25/19
 * Time: 10:30
 */
$servername = "localhost";
$username = "viec365_usercom";
$password = "ldmro7hWP";
$dbname = "viec365_tv365com";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>