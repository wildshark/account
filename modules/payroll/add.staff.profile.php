<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 2:12 PM
 */

//form A
if (empty($date)){
    $date=$_GET['date'];
}else{
    $date="";
}
if (empty($staffid)){
    $staffid=$_GET['staffid'];
}else{
    $staffid="";
}
if (empty($name)){
    $name=$_GET['name'];
}else{
    $name="";
}
if (empty($position)){
    $position=$_GET['position'];
}else{
    $position="";
}
if (empty($work)){
    $work=$_GET['work'];
}else{
    $work="";
}
//form B
if (empty($basic)){
    $basic=$_GET['basic'];
}else{
    $basic="";
}
if (empty($allowance)){
    $allowance=$_GET['allowance'];
}else{
    $allowance="";
}
if (empty($bank)){
    $bank=$_GET['bank'];
}else{
    $bank="";
}
if (empty($acctName)){
    $acctName=$_GET['acctName'];
}else{
    $acctName="";
}
if (empty($acctNo)){
    $acctNo=$_GET['acctNo'];
}else{
    $acctNo="";
}

$sql="INSERT INTO `staff_profile` (`employDate`, `staffID`, `staffName`, `positionID`, `workStatus`, `basicPay`, `allowance`, `bank`, `acctName`, `acctNumber`)
 VALUES ('$date', '$staffid', '$name', '$position', '$work', '$basic', '$allowance', '$bank', '$acctName', '$acctNo')";
$data=$conn->query($sql);



