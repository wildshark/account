<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Aug-17
 * Time: 5:15 PM
 */

if ($_POST['submit'] == 'validate'){

    $date = $_POST['date'];
    $date = date('Y-m-d', strtotime($date));
    $admissionYr = $_POST['admission-year'];
    $admissionNo = $_POST['admission-number'];
    $student_name=$_POST['student-name'];
    $category=$_POST['student-category'];
    $course=$_POST['course'];
    $email= $_POST['email'];
    $mobile=$_POST['mobile'];

    $check_admission= "SELECT * FROM `student_profile`  WHERE admissionNo = '$admissionNo'";
    $check_admission=$conn->query($check_admission);
    $chk=$check_admission->fetch_assoc();

    if ($chk['admissionNo']== $admissionNo){
        echo"Admission Number exist in the database";
    }else{

        $student_data="INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`) 
VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$admissionYr','$category')";
        $student_data=$conn->query($student_data);

        header("location: account.php?user=student-data");
    }

}else{
    echo"error";
}
