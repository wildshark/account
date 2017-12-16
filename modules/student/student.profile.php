<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13-Dec-17
 * Time: 11:05 PM
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

        $program = "select * from get_course_list WHERE  courseID='$course'";
        $program = $conn->query($program);
        $program = $program->fetch_assoc();

        $program_prefix = $program['prefix'];
        $program_school = $program['schoolID'];


        $check_admission = "SELECT * FROM `student_profile`  WHERE admissionNo = '$admissionNo'";
        $check_admission = $conn->query($check_admission);
        $chk = $check_admission->fetch_assoc();

        if ($chk['admissionNo'] == $admissionNo and $chk['studentName'] == $student_name) {
            header("location: account.php?user=student-data&error=3&alert=3");
        } else {

            //insert student into student profile
            $student_data = "INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`,`semester`) VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$school_session','$category','$semesterID')";
            $student_data = $conn->query($student_data);

            if ($student_data == TRUE){
                header("location: account.php?user=student-data&error=2&alert=2");
            }

        }
    }
}