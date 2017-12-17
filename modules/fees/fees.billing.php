<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14-Dec-17
 * Time: 12:04 AM
 */

$student_id = $_GET['id'];
$category_id = $_GET['category'];
//$status_id = $_GET['status'];
$course=$_GET['course'];
$schoolID=$_GET['school'];
$student_level=$_GET['level'];


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
    if (isset($_GET['status-new-student'])) {
        $status_id = "1";
    } elseif (isset($_GET['status-cont-student'])) {
        $status_id = "2";
    } else {

        //get the student status
        $student_status = "SELECT * FROM get_student_list WHERE studentID='$student_id'";
        $student_status = $conn->query($student_status);
        $status = $student_status->fetch_assoc();

        $status_id = $status['statusID'];
    }

    $date = $GLOBALS['date'];
    $tranDate = date("Y-m-d H:i:s");

//key
    $key = $conn->query("SELECT * FROM get_key");
    $r = $key->fetch_assoc();
    $school_session = $r['year_id'];
    $semesterID = $r['semester_id'];

//run check
    $check = "SELECT * FROM `get_print_fees_details`  WHERE yearID = '$school_session' and semesterID='$semesterID' and studentID='$student_id'";
    $check = $conn->query($check);
    if ($c = $check->fetch_assoc() == TRUE) {
        header("location: account.php?print=print.bill&s={$student_id}&y={$school_session}&ss={$semesterID}");
    } else {

        if ($category_id == 1) {
            //get school
            $data = $conn->query("SELECT * FROM get_course_list WHERE courseID='$course'");
            $r = $data->fetch_assoc();
            $schoolID = $r['schoolID'];

//get fees and fees details
            $data = $conn->query("SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$schoolID' AND statusID='$category_id'");
            $r = $data->fetch_assoc();
            $tuition = $r['tuition'];
            $other = $r['other_fees'];
            $school = $r['prefix'];

            $total_fees = $tuition + $other;
            $ref = "FE" . date('ymdhis');

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

            //tutor fees
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES('$tranDate', '$date', '$student_id', '2', '$matriculation','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//matriculation
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES('$tranDate', '$date', '$student_id', '2', '$matriculation','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//accept-fees
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES('$tranDate', '$date', '$student_id', '3', '$accept_fees','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//medical-exam
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '4', '$medical_exam','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//result-fees
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '5', '$result_fees','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//lab-fees
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '6', '$lab_fees','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//wasce
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '12', '$wasce','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//src-dues
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//hostel
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//technology
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//clinical-fees
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '9', '$clinical_fees','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//nmc-book
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '8', '$nmc_book','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//indexing
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '7', '$indexing','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//other-1
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

//other-2
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //post to payment
            $fees_payment = "INSERT INTO `fees_payment` (`tranDate`, `payDate`, `studentID`, `schoolID`, `payTypeID`, `stud_level`, `semesterID`, `sch_session`, `refNo`, `main_fees`, `tutor_materials`, `fees_amount`) VALUES ('$tranDate', '$date', '$student_id', '$schoolID', '1', '$student_level', '$semesterID', '$school_session', '$ref', '$tuition', '$other', '$total_fees')";
            $fees_payment = $conn->query($fees_payment);

            //post to ledger
            $update = "INSERT INTO `general_legder` (`tranDate`, `GL_date`, `ticketID`, `bookID`, `tranCatID`, `description`, `refNo`, `qouteDr`, `qouteCr`, `tranTypeID`, `yearID`, `semesterID`) VALUES ('$tranDate', '$date', '1', '1', '3', 'Fees Bill', '$ref', '$total_fees', '0','3','$school_session', '$semesterID')";
            $update_ledger = $conn->query($update);

            header("location: account.php?print=print.bill&s={$student_id}&y={$school_session}&ss={$semesterID}");
        } elseif ($category_id == 2) {


            $data = $conn->query("SELECT * FROM get_fees_list_continuing_student WHERE schoolID='$schoolID' AND statusID='$category_id'");
            $r = $data->fetch_assoc();
            $tuition = $r['tuition'];
            $other = $r['other_fees'];
            $school = $r['prefix'];

            $total_fees = $tuition + $other;
            $ref = "FE" . date('ymdhis');

            $hostel = $r['hostel'];
            $src_dues = $r['src_dues'];
            $technology = $r['technology'];
            $other1 = $r['other1'];
            $other2 = $r['other2'];

            //hostel
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //src-dues
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //technology
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //other-1
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //other-2
            $fees_ledger = "INSERT INTO `fees_bill` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
            $sql_x = $conn->query($fees_ledger);

            //post to payment
            $fees_payment = "INSERT INTO `fees_payment` (`tranDate`, `payDate`, `studentID`, `schoolID`, `payTypeID`, `stud_level`, `semesterID`, `sch_session`, `refNo`, `main_fees`, `tutor_materials`, `fees_amount`) VALUES ('$tranDate', '$date', '$student_id', '$schoolID', '1', '$student_level', '$semesterID', '$school_session', '$ref', '$tuition', '$other', '$total_fees')";
            $fees_payment = $conn->query($fees_payment);

            //post to ledger
            $update = "INSERT INTO `general_legder` (`tranDate`, `GL_date`, `ticketID`, `bookID`, `tranCatID`, `description`, `refNo`, `qouteDr`, `qouteCr`, `tranTypeID`, `yearID`, `semesterID`) VALUES ('$tranDate', '$date', '1', '1', '3', 'Fees Bill', '$ref', '$total_fees', '0','3','$school_session', '$semesterID')";
            $update_ledger = $conn->query($update);

            header("location: account.php?print=print.bill&s={$student_id}&y={$school_session}&ss={$semesterID}");
        }

    }
}