<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Jul-17
 * Time: 2:05 AM
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
if (empty($_GET['payment'])){
    $pay='';
}else{
    $pay=$_GET['payment'];
}

$loan=$conn->query("SELECT * FROM get_loan_calculator WHERE statusID='1' AND staffID='$staffID'");
$l=$loan->fetch_assoc();
$loanID=$l['staff_loan_ID'];

$sql="INSERT INTO `loan_details` (`staff_loan_ID`, `staffID`, `semester`, `yearID`, `date`, `amount`) 
VALUES ('$loanID', '$staffID', '$semester', '$yearID', '$date', '$pay')";
$payLoan=$conn->query($sql);

$total_payment=$conn->query("SELECT * FROM get_loan_detail WHERE staff_loan_ID='$loanID' And staffID='$staffID'");
$tp=$total_payment->fetch_assoc();
$total_payment=$tp['amount'];

$update="UPDATE `staff_loan` SET `paid`='$total_payment' WHERE (`staff_loan_ID`='$loanID') LIMIT 1";
$update=$conn->query($update);

$check="SELECT * FROM staff_loan WHERE staff_loan_ID='$loanID'";
$check=$conn->query($check);
$check=$check->fetch_assoc();
$loan_amount=$check['loan'];
$loan_paid=$check['paid'];
$loan_bal=$loan_amount - $loan_paid;

if ($loan_bal == 0 or $loan_bal <=0 ){
    $date=date("d-m-Y");
    $c=$conn->query("UPDATE `staff_loan` SET `statusID`='2', paidDateUpdate='$date' WHERE (`staff_loan_ID`='$loanID' AND staffID='$staffID') LIMIT 1");
    header("location:". $_SERVER['HTTP_REFERER']);
}else{
    $c=$conn->query("UPDATE `staff_loan` SET `statusID`='1' WHERE (`staff_loan_ID`='$loanID' AND staffID='$staffID') LIMIT 1");
    header("location:". $_SERVER['HTTP_REFERER']);
}