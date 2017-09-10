<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 7:21 PM
 */

$tranDate= date('d-m-Y h:i:sa');
$date=$_GET['date'];
$student=$_GET['ticket'];
$schoolID=$_GET['school'];
$payType=$_GET['pay'];
$ref=$_GET['ref'];
$discount=$_GET['discount'];
$amount=$_GET['amount'];
$semesterID=$_GET['semester'];
$description=$_GET['description'];

//yearID is the school Session
$yearID=date("Y");

$data=$conn->query("SELECT * FROM get_fees_list WHERE schoolID='$schoolID'");
$r=$data->fetch_assoc();
$tuition=$r['tuition'];
$other=$r['other_fees'];

//calculate fees discount
if (empty($discount) || $discount == 0){
    $fees_amount=$tuition + $other;
}else{
    $fees_cost=($tuition - ($tuition * ($discount/100)));
    $fees_amount = $fees_cost + $other;
}

//check description
if (empty($description)){
    $data=$conn->query("SELECT * FROM get_student_profile WHERE studentID='$student'");
    $r=$data->fetch_assoc();
    $stName=$r['studentName'];
    $admissionNo=$r['admissionNo'];
    $description= $stName." ~ ". $admissionNo." paid ". $amount ."ref.".$ref;
}

//check payment type 1. Cash 2.Bank
if ($payType==1){
    $data="INSERT INTO fees_payment(tranDate,payDate,studentID,schoolID,payTypeID,refNo,fees_amount,paid_amount)
VALUES ('$tranDate','$date','$student','$schoolID','$payType','$ref','$fees_amount','$amount')";
    if ($conn->query($data) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}elseif ($payType==2){
    $data="INSERT INTO fees_payment(tranDate,payDate,studentID,courseID,payTypeID,refNo,fees_amount,paid_amount)
VALUES ('$tranDate','$date','$student','$courseID','$payType','$ref','$fees_amount','$amount')";
    if ($conn->query($data) === TRUE) {

        //insert to bank in General Ledger as income
        $gl="INSERT INTO general_legder(tranDate,GL_date,ticketID,bookID,tranCatID,description,refNo,bankDr,tranTypeID,
yearID,semesterID,profitlossID,balanceSheetID)
VALUES ('$tranDate','$date','F','1','1','$description','$ref','$amount','2','$yearID','$semesterID','1','4')";
        if ($conn->query($gl) === TRUE){
            header("location:". $_SERVER['HTTP_REFERER']);
        }else{
            header("location: account.php?user=dashboard");
        }
       // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


