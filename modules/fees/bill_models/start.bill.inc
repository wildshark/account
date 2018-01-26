<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 26-Jan-18
 * Time: 6:49 PM
 */

if ($category_id == 1){ // new student

    $fees_bill = "SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$school_id' and categoryID='$category_id'";
    $fees_bill = $conn->query($fees_bill);
    $bill = $fees_bill->fetch_assoc();

    $previous_bal= $_SESSION['balance']; //old bal
    $tuition = $bill['tuition'];
    $total_fees=$bill['other_fees'];


    if (empty($_SESSION['hostel_paid_amount']) || $_SESSION['hostel_paid_amount'] == 0){

        $hostel_fees= $_SESSION['hostel'];
    }else{

        $hostel_fees = $_SESSION['hostel_paid_amount'];
    }

//calculate discount

    if ($discount == 0 || !isset($discount)){

        $fees = ($tuition + $total_fees + $hostel_fees + $previous_bal);
    }else {

        $discount_fees = ($tuition - ($tuition * ($discount / 100)));
        $fees = $discount_fees + $total_fees + $hostel_fees + $previous_bal;

    }

} elseif ($category_id == 2){ // old student

    $fees_bill = "SELECT * FROM get_fees_list_continuing_student WHERE schoolID='$school_id' and categoryID='$category_id'";
    $fees_bill = $conn->query($fees_bill);
    $bill = $fees_bill->fetch_assoc();

    $previous_bal= $_SESSION['balance']; //old bal
    $tuition = $bill['tuition'];
    $total_fees=$bill['other_fees'];

    if (empty($_SESSION['hostel_paid_amount']) || $_SESSION['hostel_paid_amount'] == 0){

        $hostel_fees= $_SESSION['hostel'];
    }else{

        $hostel_fees = $_SESSION['hostel_paid_amount'];
    }

//calculate discount

    if ($discount == 0 || !isset($discount)){

        $fees = ($tuition + $total_fees + $hostel_fees + $previous_bal);
    }else {

        $discount_fees = ($tuition - ($tuition * ($discount / 100)));
        $fees = $discount_fees + $total_fees + $hostel_fees + $previous_bal;

    }

}
