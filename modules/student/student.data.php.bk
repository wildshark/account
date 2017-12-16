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
            $lastID = "select studentID from `student_profile` ORDER BY student_profile.studentID DESC ";
            $lastID = $conn->query($lastID);
            $lastID = $lastID->fetch_assoc();

            if (empty($lastID['studentID']) || is_null($lastID['studentID'])){

                //insert student into student profile
                $student_data = "INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`,`semester`) VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$school_session','$category','$semesterID')";
                $student_data = $conn->query($student_data);

                //call student profile to get last studentID
                $re_query = "select * from `student_profile` ORDER BY student_profile.studentID DESC ";
                $re_query= $conn->query($re_query);
                $lastID = $re_query->fetch_assoc();

                $student_id = $lastID['studentID'];
                require_once "post.fees.details.php";
                require_once 'post.fees.ledger.php';

            }else{
                $student_id = $lastID['studentID'] + 1;

                $student_data = "INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`,`semester`) VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$school_session','$category','$semesterID')";
                $student_data = $conn->query($student_data);

                require_once "post.fees.details.php";
                require_once "post.fees.ledger.php";
            }

        }

    }
}