<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Aug-17
 * Time: 10:51 PM
 */

if ($_POST['submit'] == 'validate'){
    $school = $_POST['school'];
    $course = $_POST['course'];

    $data="INSERT INTO `course` (`schoolID`, `course`) 
VALUES ('$school', '$course')";
    $data=$conn->query($data);

    header("location: account.php?user=course-data");
}else{
    echo"error";
}