<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Dec-17
 * Time: 6:49 PM
 */



if (empty($_SESSION['userID'])){
    session_destroy();
    header("location: index.php");
}else{

    switch ($_GET['delete']){

        case"student-data";

            $id=$_GET['id'];
            $del_student="DELETE FROM `student_profile` WHERE (`studentID`='$id')";
            if ($del=$conn->query($del_student) == TRUE) {

                $del_fees_bill = "DELETE FROM `fees_bill` WHERE (`studentID`='$id')";
                $del = $conn->query($del_fees_bill);

                $del_fees_payment = "DELETE FROM `fees_payment` WHERE (`studentID`='$id')";
                $del = $conn->query($del_fees_payment);

                header("location: account.php?user=student-data&error=4&alert=2&c={$roleID}");

            }
        break;
        case"expenditures-book";
            $id=$_GET['id'];
            $del_expenses="DELETE FROM `general_legder` WHERE (`GL_ID`='$id')";
            $del=$conn->query($del_expenses);

            header("location: account.php?user=expenditure&error=4&alert=2&c={$roleID}");
        break;

        case"pay-voucher";
            $id=$_GET['id'];
            $del_voucher="DELETE FROM `general_legder` WHERE (`GL_ID`='$id')";
            $del=$conn->query($del_voucher);

            header("location: account.php?user=pay.voucher&error=4&alert=2&c={$roleID}");

        break;

        case "fees-ledger";
            $id=$_GET['id'];
            $semester=$_GET['semester'];
            $year=$_GET['year'];

            $del_fees_ledger="DELETE FROM `fees_payment` WHERE (studentID ='$id')";
            $del=$conn->query($del_fees_ledger);
            if ($del === TRUE){
                $del_bill = "DELETE FROM fees_bill WHERE ( studentID= '$id' and semesterID='$semester' and yearID ='$year')";
                $del=$conn->query($del_bill);
                header("location: account.php?user=fees.ledger&error=4&alert=2&c='$roleID'");
            }
        break;

    }
}
