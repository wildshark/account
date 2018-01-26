<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25-Aug-17
 * Time: 6:07 PM
 */

if ($_GET['submit'] == 'save'){
   // echo "fees entery";
    $school = $_GET['school'];
    $category = $_GET['student-cat'];
    $tuition = $_GET['tuition-fees'];
    $matriculation = $_GET['matriculation'];
    $acceptance = $_GET['acceptance'];
    $medical = $_GET['medical-examination'];
    $result = $_GET['result-fees'];
    $lab=$_GET['lab-fees'];
    $indexing = $_GET['indexing-fees'];
    $nmc = $_GET['nmc-clinical'];
    $clinical = $_GET['clinical-fees'];
    $wasce = $_GET['wasce-fees'];
    $hostel=$_GET['hostel'];
    $technology=$_GET['technology'];
    $other1=$_GET['other1'];
    $other2=$_GET['other2'];

    $data="INSERT INTO `fees_price_list` (`schoolID`,`categoryID`, `tuition`, `matriculation`, `accept_fees`, `medical_examin`, `result_fees`, `lab_fees`, `indexing`, `nmc_book`, `clinical_fees`, `wasce`,`hostel`,`technology`,`other1`,`other2`)
VALUES ('$school', '$category', '$tuition', '$matriculation', '$acceptance', '$medical', '$result','$lab', '$indexing', '$nmc', '$clinical', '$wasce','$hostel','$technology','$other1','$other2')";
    $data=$conn->query($data);

    if ($data == TRUE){
        header("location: account.php?user=fees.costing&error=2&alert=2");
    }else{
        echo $page->error;
    }

}else{
    echo $page->error;
}


