<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Dec-17
 * Time: 4:48 PM
 */

function new_student_fees($conn){
    // echo "test";
    $date = $GLOBALS['date'];
    $tranDate = date("Y-m-d H:i:s");
    $school_session = $GLOBALS['admissionYr'];
    $category = $GLOBALS['category'];
    $course = $GLOBALS['schoolID'];
    $semesterID = $GLOBALS['semester'];
    $student_id = $GLOBALS['student'];

    //get school
    $data = $conn->query("SELECT * FROM get_course_list WHERE courseID='$course'");
    $r = $data->fetch_assoc();
    $schoolID = $r['schoolID'];

    //get fees and fees details
    $data = $conn->query("SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$schoolID' AND statusID='$category'");
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

    //matriculation
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES('$tranDate', '$date', '$student_id', '2', '$matriculation','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //accept-fees
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES('$tranDate', '$date', '$student_id', '3', '$accept_fees','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //medical-exam
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '4', '$medical_exam','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //result-fees
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '5', '$result_fees','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //lab-fees
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '6', '$lab_fees','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //wasce
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '12', '$wasce','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //src-dues
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //hostel
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //technology
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //clinical-fees
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '9', '$clinical_fees','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //nmc-book
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '8', '$nmc_book','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //indexing
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '7', '$indexing','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //other-1
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

    //other-2
    $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
            ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
    $sql_x=$conn->query($fees_ledger);

}

