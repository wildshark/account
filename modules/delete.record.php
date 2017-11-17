<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:53 PM
 *
 * the url code for delete record
 * <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
 */

//field id is as data
$id= $_GET['data'];

//delete record on table: fees_price_list
if ($_GET['c']=="fees"){

     $data=$conn->query("DELETE FROM `fees_price_list` WHERE (`feesID`='$id')");
     header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete record on table: general_legder
if ($_GET['c']=="pay"){

    $data=$conn->query("DELETE FROM `general_legder` WHERE (`GL_ID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete record on table: fees_payment
if ($_GET['c']=="fees.pay"){

    $data=$conn->query("DELETE FROM `fees_payment` WHERE (`payID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete staff loan
if ($_GET['c']=="staff.loan"){

    //delete from staff loan
    $data=$conn->query("DELETE FROM `staff_loan` WHERE (`staff_loan_ID`='$id')");
    //delete from loan details
    $data=$conn->query("DELETE FROM `loan_details` WHERE (`staff_loan_ID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete loan
if ($_GET['c']=="paid.loan"){

    $data=$conn->query("DELETE FROM `loan_details` WHERE (`staff_loan_ID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete payroll record
if ($_GET['c']=="payroll"){

    $data=$conn->query("DELETE FROM `payroll` WHERE (`payrollID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}

//delete course record
if($_GET['c'] == "course"){

    $data=$conn->query("DELETE FROM `course` WHERE (`courseID`='$id')");
    header("location: account.php?user=course-data&error=4&alert=2");

}