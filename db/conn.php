<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 9:53 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$database="ghanacu_account";
$port="3306";
// Create connection
$conn = new mysqli($servername, $username, $password,$database,$port);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
