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

if ($student_entry_type == 1) {

    $data = $conn->query("SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$schoolID' AND statusID='$student_category_id'");
    $r = $data->fetch_assoc();
    $tuition = $r['tuition'];
    $other = $r['other_fees'];
    $school = $r['prefix'];

    $matriculation = $r['matriculation'];
    $accept_fees = $r['accept_fees'];
    $medical_exam = $r['medical_examin'];
    $result_fees = $r['result_fees'];
    $lab_fees = $r['lab_fees'];
    $wasce = $r['wasce'];
    $src_dues = $r['src_dues'];
    $hostel = $r['hostel'];
    $technology = $r['technology'];
    $clinical_fees = $r['clinical_fees'];
    $nmc_book = $r['nmc_book'];
    $indexing = $r['indexing'];
    $other1 = $r['other1'];
    $other2 = $r['other2'];

    $fees_cost = $tuition + $other;
//post payment into fees journals
    if (isset($_GET['matriculation'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '2', '$matriculation','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['accept-fees'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '3', '$accept_fees','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['medical-exam'] )){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '4', '$medical_exam','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['result-fees'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '5', '$result_fees','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['lab-fees'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '6', '$lab_fees','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['wasce'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '12', '$wasce','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['src-dues'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['hostel'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['technology'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['clinical-fees'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '9', '$clinical_fees','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['nmc-book'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '8', '$nmc_book','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['indexing'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '7', '$indexing','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['other-1'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['other-2'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

}elseif ($student_entry_type== 2){

    $data=$conn->query("SELECT * FROM get_fees_list_continuing_student WHERE schoolID='$schoolID' AND statusID='$student_category_id'");
    $r = $data->fetch_assoc();
    $tuition = $r['tuition'];
    $other = $r['other_fees'];
    $school = $r['prefix'];
    $fees_cost=$tuition + $other;

    $hostel = $r['hostel'];
    $src_dues = $r['src_dues'];
    $technology = $r['technology'];
    $other1 = $r['other1'];
    $other2 = $r['other2'];

    if (isset($_GET['hostel'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['src-dues'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['technology'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['other-1'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

    if (isset($_GET['other-2'])){
        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
        $sql_x=$conn->query($fees_ledger);
    }

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
$data="INSERT INTO fees_payment(tranDate,payDate,studentID,schoolID,payTypeID,refNo,fees_amount,paid_amount,stud_level,semesterID,sch_session,main_fees,discount,tutor_materials)
VALUES ('$tranDate','$date','$student_id','$schoolID','$payType','$ref','$fees_amount','$amount','$level','$semesterID','$school_session','$fees_cost','$discount','$other')";
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