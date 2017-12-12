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
            if ($del=$conn->query($del_student) == TRUE){

                $del_fees_bill="DELETE FROM `fees_journal` WHERE (`studentID`='$id')";
                $del=$conn->query($del_fees_bill);

                $del_fees_payment="DELETE FROM `fees_payment` WHERE (`studentID`='$id')";
                $del=$conn->query($del_fees_payment);

                header("location: account.php?user=student-data&error=4&alert=2&c={$roleID}");

            }
        break;



    }
}
