<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 12-Dec-17
 * Time: 9:17 AM
 */


//get_fees_bill

$fee_bill="SELECT * FROM get_fees_bill WHERE yearID = '$school_session' AND semesterID = '$semesterID' AND studentID = '$student_id' And revenueID=1";
$fee_bill=$conn->query($fee_bill);
$bill= $fee_bill->fetch_assoc();

$date=$bill['jDate'];
$year=$bill['yearID'];
$semester=$bill['semesterID'];
$fees=$bill['bill_amount'];


$fee_bill="SELECT bill_amount FROM get_fees_bill_other WHERE yearID = '$school_session' AND semesterID = '$semesterID' AND studentID = '$student_id'";
$fee_bill=$conn->query($fee_bill);
$bill= $fee_bill->fetch_assoc();
$other= $bill['bill_amount'];

$amount=$fees+$other;

$ref='NB'.date('dmY');
//post to fee payment
$data="INSERT INTO fees_payment(tranDate,payDate,studentID,schoolID,payTypeID,refNo,fees_amount,paid_amount,semesterID,sch_session,main_fees,discount,tutor_materials)
VALUES ('$tranDate','$date','$student_id','$program_school','3','$ref','$amount','0','$semester','$year','$amount','0','$other')";
$data=$conn->query($data);

header("location: account.php?user=student-data&error=2&alert=2&c={$userID}");