<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Dec-17
 * Time: 6:06 PM
 */

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
