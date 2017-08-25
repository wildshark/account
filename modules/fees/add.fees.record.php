<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:56 PM
 */

$school = $_GET['school'];
$tuition = $_GET['tuition-fees'];
$matriculation = $_GET['matriculation'];
$accept_fees = $_GET['accept_fees'];
$medical_examin = $_GET['medical-exam'];
$result_fees = $_GET['result-fees'];
$lab_fees = $_GET['lab-fees'];
$indexing = $_GET['indexing'];
$nmc_book = $_GET['nmc-book'];
$clinical_fees = $_GET['clinical-fees'];
$graduation_fees = $_GET['graduation-fees'];
$src_dues = $_GET['src-dues'];
$tech_user =$_GET['tech-user-fees'];
$status=$_GET['status'];

$data="INSERT INTO `fees_price_list` 
(`schoolID`,`tuition`, `matriculation`, `accept_fees`, `medical_examin`, `result_fees`, `lab_fees`, `indexing`, `nmc_book`, `clinical_fees`, `graduation_fees`,`statusID`) 
VALUES ('$school','$tuition', '$matriculation', '$accept_fees', '$medical_examin', '$result_fees', '$lab_fees', '$indexing', '$nmc_book', '$clinical_fees', '$graduation_fees','$status')";
if ($conn->query($data) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


