<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Aug-17
 * Time: 10:51 PM
 */

if ($_GET['submit'] == 'validate'){
    if (empty($_GET['school'])){
        header("location: account.php?user=course-data&error=1&alert=1");
    }elseif (empty($_GET['course'])){
        header("location: account.php?user=course-data&error=1&alert=1");
    }else{
        $school = $_GET['school'];
        $course = $_GET['course'];

        $data="INSERT INTO `course` (`schoolID`, `course`) 
VALUES ('$school', '$course')";
        $data=$conn->query($data);

        header("location: account.php?user=course-data&error=2&alert=2");
    }
}else{
    echo"error";
}