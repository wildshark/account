<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05-Jul-17
 * Time: 11:47 PM
 */

if (empty($_GET['date'])){
    $date='';
}else{
    $date=$_GET['date'];
}
if (empty($_GET['staff'])){
    $staffID='';
}else{
  $staffID=$_GET['staff'];
}
if (empty($_GET['year'])){
    $yearID='';
}else{
    $yearID=$_GET['year'];
}
if (empty($_GET['semester'])){
    $semester='';
}else{
    $semester=$_GET['semester'];
}
if (empty($_GET['detail'])){
    $detail='';
}else{
    $detail=$_GET['detail'];
}
if (empty($_GET['payment'])){
    $pay='';
}else{
    $pay=$_GET['payment'];
}
if (empty($_GET['amount'])){
    $amount='';
}else{
    $amount=$_GET['amount'];
}

$getLoan=$conn->query("SELECT * FROM get_loan_calculator WHERE staffID='$staffID'");
$l=$getLoan->fetch_assoc();

$old_loan=$l['loan_bal'];

if ($old_loan < 100){
    $loan_post="INSERT INTO `staff_loan` (`tranDate`, `loanDate`, `staffID`, `detail`, `yearID`, `semester`, `pay_amount`, `loan`) 
VALUES ('$tranDate', '$date', '$staffID', '$detail', '$yearID', '$semester','$pay','$amount')";
    $loan_post=$conn->query($loan_post);
}else{
    echo "Can't give loan";
    exit();
}
