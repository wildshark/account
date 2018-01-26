<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14-Dec-17
 * Time: 12:04 AM
 */

$student_id = $_GET['id']; //student id
$category_id = $_GET['category']; // if foreign or local student
$school_id = $_GET['school']; //school id
$course=$_GET['course']; //curse id
$school_session=$_GET['school-session']; //school session
$semesterID= $_GET['semester']; //semester 1 or 2
$student_level=$_GET['student-level']; // student level
$discount = $_GET['discount']; //student discount
$hostel_fees_paid = $_GET['hostel-fees-paid']; // hostel fees payable amount by student
$hostel_bill_status = $_GET['hostel-bill-status']; // include or exclude hostel fees to bill
$student_status = $_GET['student-status'];
//other information

$previous_bal = $_SESSION['balance']; //old bal
$tuition = $_SESSION['tuition'];
$total_fees = $_SESSION['total_fees'];
$hostel_fees = $_SESSION['hostel'];

$_SESSION['hostel_paid_amount'] = $hostel_fees_paid;

$tranDate = date("Y-m-d H:i:s");

if(!isset($student_level)){
header("location: account.php?user=fees.billing&error=7&alert=3&c={$roleID}");
}elseif(!$student_level == 100){
    header("location: account.php?user=fees.billing&error=7&alert=3&c={$roleID}");
}elseif(!$student_level == 200) {
header("location: account.php?user=fees.billing&error=7&alert=3&c={$roleID}");
}elseif (!$student_level == 300) {
header("location: account.php?user=fees.billing&error=7&alert=3&c={$roleID}");
}elseif (!$student_level == 400){
    header("location: account.php?user=fees.billing&error=7&alert=3&c={$roleID}");
}else {

    //get the student status if new or cont. student
   $student_data = "SELECT * FROM get_student_list WHERE studentID='$student_id'";
    $student_data = $conn->query($student_data);
    $student = $student_data->fetch_assoc();

    // $student['studentID'];
    //$student['statusID'];

    //check if student id exist
    if ($student['studentID'] == $student_id ) {
        if ($student_status == 1 and $category_id == 1) {
            //echo "new student & local";
            require_once "bill_models/start.bill.inc";
            require_once "bill_models/new_student/new.local.student.billing.module";
        } elseif ($student_status == 1 and $category_id == 2) {
            //echo "new student & foreign";
            require_once "bill_models/start.bill.inc";
            require_once "bill_models/new_student/new.foreign.student.billing.module";
        } elseif ($student_status == 2 and $category_id == 1) {
           //echo "cont. student & local";
            require_once "bill_models/start.bill.inc";
            require_once "bill_models/cont_student/cont.local.student.billing.module";
        } elseif ($student_status == 2 and $category_id == 2){
            //echo "cont. student & Foreign";
            require_once "bill_models/start.bill.inc";
            require_once "bill_models/cont_student/cont.foreign.student.billing.module";
        }else{
             header("location: account.php?user=fees.billing&error=100&alert=4&c={$roleID}");
        }

    } else {
        //echo "error";
       header("location: account.php?user=fees.billing&error=100&alert=4&c={$roleID}");
    }
}
