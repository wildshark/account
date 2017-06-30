<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 4:48 PM
 */


$date=$_GET['date'];
$tranID=$_GET['type'];
$details=$_GET['detail'];
$ref=$_GET['ref'];
$amount=$_GET['amount'];
$semester=$_GET['semester'];
$yearId=date("Y");
$ticketID=$_GET['ticket'];
$payType=$_GET['pay'];

$sql="SELECT * FROM chart_of_account WHERE TranCatID='$tranID'";
$sql=$conn->query($sql);
$r=$sql->fetch_assoc();

$t_book=$r['bookID'];
$t_profit= $r['profitLossID'];
$t_balSheet=$r['balanceSheetID'];
$t_date=date("d-m-Y h:i:s");

if ($payType==1){

        //if payment type is cash
        $sql = "INSERT INTO general_legder (tranDate,GL_date,ticketID,tranCatID,description,refNo,semesterID,yearID,bookID,tranTypeID,profitlossID,balanceSheetID,cashCr,qouteCr)
    VALUES ('$t_date','$date','$ticketID','$tranID', '$details','$ref','$semester','$yearId','$t_book','3','$t_profit','$t_balSheet','$amount','$amount')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
    }
}elseif ($payType==2){

    //if payment type is bank
    $sql = "INSERT INTO general_legder (tranDate,GL_date,ticketID,tranCatID,description,refNo,semesterID,yearID,bookID,tranTypeID,profitlossID,balanceSheetID,bankCr,qouteCr)
    VALUES ('$t_date','$date','$ticketID','$tranID', '$details','$ref','$semester','$yearId','$t_book','3','$t_profit','$t_balSheet','$amount','$amount')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


