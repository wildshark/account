<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:56 PM
 */

$school=$_GET['school'];
$course=$_GET['course'];
$amount=$_GET['amount'];

$data="INSERT INTO fees_price_list(schoolID, courseID, amount) 
VALUES ('$school','$course','$amount')";
if ($conn->query($data) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


