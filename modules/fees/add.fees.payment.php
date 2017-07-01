<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 7:21 PM
 */

$date=$_GET['date'];
$student=$_GET['student'];
$courseID=$_GET['course'];
$payType=$_GET['pay'];
$ref=$_GET['ref'];
$detail=$_GET['detail'];
$amount=$_GET['amount'];

$data=$conn->query("SELECT * FROM fees_price_list WHERE courseID='$courseID'");
$r=$data->fetch_assoc();
$fees_amount=$r['amount'];

$data="INSERT INTO fees_payment(payDate,studentID,courseID,payTypeID,refNo,fees_amount,paid_amount)
VALUES ('$data','$student','$courseID','$payType','$ref','$fees_amount','$amount')";
if ($conn->query($data) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
