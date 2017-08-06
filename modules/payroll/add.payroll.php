<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Aug-17
 * Time: 9:36 AM
 */



$date=$_SESSION['date'];

$staffID=$_SESSION['staffID'];
$basic=$_SESSION['basic'];
$allowance=$_SESSION['allowance'];
$ssf=$_SESSION['ssf'];
$year= $date("Y");
$acctName=$_SESSION['acctName'];
$acctNo=$_SESSION['acctNo'];
$bank=$_SESSION['bank'];
$bankID=$_SESSION['bankID'];


$sub_total=$_SESSION['sub_total'];
$taxable_salary=$_SESSION['taxable_salary'];

$GH216=$_SESSION['c261'];
$GH108=$_SESSION['c108'];
$GH151=$_SESSION['c151'];
$GH2765=$_SESSION['c2765'];

$total_paye=$_SESSION['total_paye'];
$net_salary=$_SESSION['net_salary'];
$TotalSalaryCost=$_SESSION['TotalSalaryCost'];

echo $payroll="INSERT INTO `payroll` (`payDate`, `staffID`, `basic`, `ssf`, `allowance`, `year`, `semester`, `bankID`, `acctName`, `AcctNo`, `GH216Free`, `GH108`, `GH151`, `GH2765`, `salary`) 
VALUES ('$date', '$staffID', '$basic', '$ssf', '$allowance', '$year', '22', '$bankID', '$acctName', '$acctNo', '$GH216', '$GH108', '$GH151', '$GH2765', '2')";

//header("location:" .$_SERVER['HTTP_REFERER']);