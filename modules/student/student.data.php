<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Aug-17
 * Time: 5:15 PM
 */

if ($_GET['submit'] == 'validate'){

    if (empty($_GET['date'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif(empty($_GET['admission-year'])) {
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['admission-number'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['student-name'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['student-category'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['course'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['email'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }elseif (empty($_GET['mobile'])){
        header("location: account.php?user=student-data&error=3&alert=1");
    }else{

        $date = $_GET['date'];
        $date = date('Y-m-d', strtotime($date));
        $admissionYr = $_GET['admission-year'];
        $admissionNo = $_GET['admission-number'];
        $student_name=$_GET['student-name'];
        $category=$_GET['student-category'];
        $course=$_GET['course'];
        $email= $_GET['email'];
        $mobile=$_GET['mobile'];

        $check_admission= "SELECT * FROM `student_profile`  WHERE admissionNo = '$admissionNo'";
        $check_admission=$conn->query($check_admission);
        $chk=$check_admission->fetch_assoc();

        if ($chk['admissionNo'] == $admissionNo and $chk['studentName']==$student_name){
            header("location: account.php?user=student-data&error=3&alert=3");
        }else {

            //insert in cash book new student
            $student_data = "INSERT INTO `student_profile` (`admissionDate`, `studentName`, `admissionNo`, `mobile`, `courseID`, `admissionYr`,`categoryID`) 
VALUES ('$date', '$student_name', '$admissionNo', '$mobile', '$course', '$admissionYr','$category')";
            $student_data = $conn->query($student_data);
            if ($student_data == TRUE){
                header("location: account.php?user=student-data&error=2&alert=2");
            }
        }
    }

}else{
    echo"error";
}
