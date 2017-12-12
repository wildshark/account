<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Dec-17
 * Time: 8:29 AM
 */

if ($_GET['submit'] == 'validate') {

    if (empty($_GET['date'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['admission-year'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['admission-number'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['student-name'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['student-category'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['course'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['semester'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['email'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } elseif (empty($_GET['mobile'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    } else {

        $date = $_GET['date'];
        $date = date('Y-m-d', strtotime($date));
        $semesterID = $_GET['semester'];
        $school_session = $_GET['admission-year'];
        $admissionNo = $_GET['admission-number'];
        $student_name = $_GET['student-name'];
        $category = $_GET['student-category'];
        $course = $_GET['course'];
        $email = $_GET['email'];
        $mobile = $_GET['mobile'];

        $program= "select * from get_course_list WHERE  courseID='$course'";
        $program=$conn->query($program);
        $program = $program->fetch_assoc();

        $program_prefix=$program['prefix'];
        $program_school=$program['schoolID'];


        $check_admission = "SELECT * FROM `student_profile`  WHERE admissionNo = '$admissionNo'";
        $check_admission = $conn->query($check_admission);
        $chk = $check_admission->fetch_assoc();

        if ($chk['admissionNo'] == $admissionNo and $chk['studentName'] == $student_name) {
            header("location: account.php?user=student-data&error=3&alert=3");
        } else {

            //get last studentID
            $lastID = "select * from `student_profile` ORDER BY student_profile.studentID DESC ";
            $lastID = $conn->query($lastID);
            $lastID = $lastID->fetch_assoc();

            if (!empty($lastID['studentID']) || is_null($lastID['studentID'])){
                $re_query = "select * from `student_profile` ORDER BY student_profile.studentID DESC ";
                $re_query= $conn->query($re_query);
                $lastID = $re_query->fetch_assoc();
                $student_id = $lastID['studentID'];
            }else{
                $student_id = $lastID['studentID'] + 1;
            }

            //insert into student profile
            $student_data = "INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`,`semester`) VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$school_session','$category','$semesterID')";
            $student_data = $conn->query($student_data);
            if ($student_data == TRUE){

                if ($category == 1) {

                    $fees_cost = "Select * from get_fees_list_for_new_student WHERE statusID ='$category' and prefix='$program_prefix'";
                    $fees_cost = $conn->query($fees_cost);
                    $r = $fees_cost->fetch_assoc();
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
                    if (isset($r['matriculation'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '2', '$matriculation','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['accept_fees'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '3', '$accept_fees','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['medical_exam'] )){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '4', '$medical_exam','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['result_fees'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '5', '$result_fees','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['lab_fees'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '6', '$lab_fees','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['wasce'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '12', '$wasce','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['src_dues'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['hostel'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['technology'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['clinical_fees'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '9', '$clinical_fees','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['nmc_book'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '8', '$nmc_book','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['indexing'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '7', '$indexing','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['other1'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['other1'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                }elseif ($category== 2){

                    $fees_cost = "Select * from get_fees_list_for_new_student WHERE statusID ='$category' and prefix='$program_prefix'";
                    $fees_cost = $conn->query($fees_cost);
                    $r = $fees_cost->fetch_assoc();

                    $tuition = $r['tuition'];
                    $other = $r['other_fees'];
                    $school = $r['prefix'];

                    $fees_cost=$tuition + $other;

                    $hostel = $r['hostel'];
                    $src_dues = $r['src_dues'];
                    $technology = $r['technology'];
                    $other1 = $r['other1'];
                    $other2 = $r['other2'];

                    if (isset($r['hostel'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '11', '$hostel','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['src-dues'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '13', '$src_dues','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['technology'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '10', '$technology','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['other1'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '14', '$other1','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                    if (isset($r['other2'])){
                        $fees_ledger = "INSERT INTO `fees_journal` (`transDate`, `jDate`, `studentID`, `revenueID`, `amount`,`yearID`,`semesterID`) VALUES
        ('$tranDate', '$date', '$student_id', '15', '$other2','$school_session','$semesterID')";
                        $sql_x=$conn->query($fees_ledger);
                    }

                }

            }
        }

    }
}