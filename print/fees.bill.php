<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14-Dec-17
 * Time: 12:02 AM
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div style="margin:5% 40% 0% 33%;float:left; width:500px; box-shadow:0 0 3px #aaa; height:auto;color:#666;">
    <div style="width:100%; padding:10px; float:left; background:#1ca8dd; color:#fff; font-size:30px; text-align:center;">
        School Fees Bill
    </div>
    <div style="width:100%; padding:0px 0px;border-bottom:1px solid rgba(0,0,0,0.2);float:left;">
        <div style="width:30%; float:left;padding:10px;">
            <?php print_student_profile($conn,$student);?>
        </div>

        <div style="width:40%; float:right;padding:">
            <span style="font-size:14px;float:right;  padding:10px; text-align:right;">
                <b>Date : </b><?php echo date('d-m-Y')?>
            </span>
            <span style="font-size:14px;float:right;  padding:10px; text-align:right;">
               <b>Invoice# : </b>SDO-<?php print_invoice_no($conn);?>
            </span>
        </div>
    </div>
     
    <div style="width:100%; padding:0px; float:left;">
        <div style="width:100%;float:left;background:#efefef;">
            <span style="float:left; text-align:left;padding:10px;width:50%;color:#888;font-weight:600;">
                Decription
            </span>
            <span style="font-weight:600;float:left;padding:10px ;width:40%;color:#888;text-align:right;">
                Amount
            </span>
        </div>
            <?php print_fees_bill($conn,$year,$semester,$student);?>
        </div>

        <div style="width:100%;float:left; background:#fff;">
            <?php print_fees_total($conn,$year,$semester,$student);?>
        </div>
    </div>
