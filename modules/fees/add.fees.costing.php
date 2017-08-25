<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25-Aug-17
 * Time: 6:07 PM
 */

if ($_GET['submit'] == 'save'){
    $school = $_GET['school'];
    $category = $_GET['student-cat'];
    $tuition = $_GET['tuition-fees'];
    $matriculation = $_GET['matriculation'];
    $acceptance = $_GET['acceptance'];
    $medical = $_GET['medical-examination'];
    $result = $_GET['result-fees'];
    $indexing = $_GET['indexing-fees'];
    $nmc = $_GET['nmc-clinical'];
    $clinical = $_GET['clinical-fees'];
    $graduation = $_GET['graduation-fees'];


    $data="INSERT INTO `fees_price_list` (`schoolID`,`statusID`, `tuition`, `matriculation`, `accept_fees`, `medical_examin`, `result_fees`, `lab_fees`, `indexing`, `nmc_book`, `clinical_fees`, `graduation_fees`) 
VALUES ('$school', '$category', '$tuition', '$matriculation', '$acceptance', '$medical', '$result', '$indexing', '$nmc', '$clinical', '$graduation')";
    $data=$conn->query($data);
}else{
    echo "error";
}


