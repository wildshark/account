<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 2:08 PM
 */


$date=$_GET['date'];
$date=strtotime($date);
$date= date("Y/m/d",$date);
$tranID=$_GET['type'];
$details=$_GET['detail'];
$ref=$_GET['ref'];
$amount=$_GET['amount'];
$semester=$_GET['semester'];
$yearId=date("Y");
$ticketID=$_GET['ticket'];

$sql="SELECT * FROM chart_of_account WHERE TranCatID='$tranID'";
$sql=$conn->query($sql);
$r=$sql->fetch_assoc();

$t_book=$r['bookID'];
$t_profit= $r['profitLossID'];
$t_balSheet=$r['balanceSheetID'];

$sql = "INSERT INTO general_legder (tranDate,GL_date,ticketID,tranCatID,description,refNo,semesterID,yearID,bookID,tranTypeID,profitlossID,balanceSheetID,qouteDr)
VALUES ('$tranDate','$date','$ticketID','$tranID', '$details','$ref','$semester','$yearId','$t_book','3','$t_profit','$t_balSheet','$amount')";
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("location: account.php?user=expenditure");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


