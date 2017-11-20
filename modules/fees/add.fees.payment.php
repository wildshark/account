<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 7:21 PM
 */

$tranDate= date('Y-m-d h:i:s');

$d=strtotime($_GET['date']);
$date= date("Y-m-d",$d);

$student_entry_type=$_GET['student-entry-type'];
$student_id= $_GET['student-id'];
$schoolID= $_GET['school'];
$payType= $_GET['pay'];
$ref= $_GET['ref'];
$discount= $_GET['discount'];
$amount= $_GET['amount'];
$semesterID= $_GET['semester'];
$description= $_GET['description'];
$level= $_GET['level'];
$school_session= $_GET['session'];
$student_category_id= $_GET['category-id'];

//get fees for new intake and returning student

if ($student_entry_type == 1){

    $data=$conn->query("SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$schoolID' AND statusID='$student_category_id'");
    $r=$data->fetch_assoc();
    $tuition=$r['tuition'];
    $other=$r['other_fees'];
    $school=$r['prefix'];
    $fees_cost=$tuition+$other;

}elseif ($student_entry_type== 2){

    $data=$conn->query("SELECT * FROM get_fees_list_continuing_student WHERE schoolID='$schoolID' AND statusID='$student_category_id'");
    $r=$data->fetch_assoc();
    $tuition=$r['tuition'];
    $other=$r['other_fees'];
    $school=$r['prefix'];
    $fees_cost=$tuition+$other;

}


//calculate fees discount
if (empty($discount) || $discount == 0){
    $fees_amount=$tuition + $other;
}else{
    $fees_cost=($tuition - ($tuition * ($discount/100)));
    $fees_amount = $fees_cost + $other;
}

//check description
if (empty($description)){
    $data=$conn->query("SELECT * FROM get_student_profile WHERE studentID='$student_id'");
    $r=$data->fetch_assoc();
    $stName=$r['studentName'];
    $admissionNo=$r['admissionNo'];

    $description= $stName." ~ ". $admissionNo." paid ". $amount ."ref.".$ref;
}

//check payment type 1. cash 2.Bank

$data="INSERT INTO fees_payment(tranDate,payDate,studentID,schoolID,payTypeID,refNo,fees_amount,paid_amount,stud_level,semesterID,sch_session,main_fees,discount)
VALUES ('$tranDate','$date','$student_id','$schoolID','$payType','$ref','$fees_amount','$amount','$level','$semesterID','$school_session','$fees_cost','$discount')";
    if ($conn->query($data) === TRUE) {
        //echo "New record created successfully";
        if ($payType == 2){

            $fees_revenue="INSERT INTO `fees_revenue` (`tranDate`, `payDate`, `studentID`, `payID`,`schoolID`,`amount`) VALUES ('$tranDate', '$date', '$student_id', '$payType','$schoolID','$amount')";
            $fees_revenue=$conn->query($fees_revenue);

            //insert in General Ledger ~ BANK
            $gl="INSERT INTO general_legder(tranDate,GL_date,ticketID,bookID,tranCatID,description,refNo,bankDr,tranTypeID,yearID,semesterID,profitlossID,balanceSheetID)
VALUES ('$tranDate','$date','F','1','1','$description','$ref','$amount','2','$yearID','$semesterID','1','4')";
            if ($conn->query($gl) === TRUE){
                
                $_SESSION['tranDate']=$tranDate;
                $_SESSION['date']=$date;
                $_SESSION['student']=$student;
                $_SESSION['school']=$school;
                $_SESSION['ref']=$ref;
                $_SESSION['level']=$level;
                $_SESSION['semester']=$semesterID;

                header("location: print.php?print-page=pos");
            }else{
                header("location: account.php?user=dashboard");
            }
        }elseif ($payType == 1){
            //insert in General Ledger ~ Cash
            $fees_revenue="INSERT INTO `fees_revenue` (`tranDate`, `payDate`, `studentID`, `payID`,`schoolID`,`amount`) VALUES ('$tranDate', '$date', '$student_id', '$payType','$schoolID','$amount')";
            $fees_revenue=$conn->query($fees_revenue);
            if ($fees_revenue == TRUE){

                $_SESSION['tranDate']=$tranDate;
                $_SESSION['date']=$date;
                $_SESSION['student']=$student;
                $_SESSION['school']=$school;
                $_SESSION['ref']=$ref;
                $_SESSION['level']=$level;
                $_SESSION['semester']=$semesterID;

                header("location: print.php?print-page=pos");
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }