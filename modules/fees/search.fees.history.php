<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 10:33 PM
 */

$id=$_GET['q'];

$profile=$conn->query("SELECT * FROM student_profile WHERE studentID='$id'");
$p=$profile->fetch_assoc();

$_SESSION['name']=$p['studentName'];
$_SESSION['admission']=$p['AdmissionNo'];
$_SESSION['studentID']=$p['studentID'];

//$data=$conn->query("SELECT * FROM fees_payment WHERE studentID='$id'");
//$f=$data->fetch_assoc();

$bal=$conn->query("SELECT * FROM get_fees_balance WHERE  studentID='$id'");
$b=$bal->fetch_assoc();

$_SESSION['fees'] = $b['fees'];
$_SESSION['paid'] = $b['paid'];
$_SESSION['bal'] = $b['bal'];


header("location:" . $_SERVER['HTTP_REFERER']);
