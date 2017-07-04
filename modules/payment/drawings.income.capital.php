<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 8:02 AM
 */

$tranDate=date("d-m-Y h:i:s");
$date=$_GET['date'];
$ref=$_GET['ref'];
$details=$_GET['detail'];
$semester=$_GET['semester'];
$yearID=$_GET['session'];
$payType=$_GET['pay'];
$amount=$_GET['amount'];

$book='2';
$capital='41';
$pl='3';
$tb='5';

if ($payType == 1){
    echo $sql="INSERT INTO general_legder (tranDate, GL_date,ticketID, bookID, tranCatID, description, refNo, qouteCr,cashCr,bankCr,tranTypeID, yearID, semesterID, profitlossID, balanceSheetID,capital)
VALUES('$tranDate','$date','WD','$book','$capital','$details','$ref','$amount','$amount','0','1','$yearID','$semester','$pl','$tb','$amount')";
    $d=$conn->query($sql);

}elseif ($payType == 2){
    echo $sql="INSERT INTO general_legder (tranDate, GL_date, ticketID,bookID, tranCatID, description, refNo, qouteCr,cashCr,bankCr,tranTypeID, yearID, semesterID, profitlossID, balanceSheetID,capital)
VALUES('$tranDate','$date','WD','$book','$capital','$details','$ref','$amount','0','$amount','2','$yearID','$semester','$pl','$tb','$amount')";
    $d=$conn->query($sql);

}
