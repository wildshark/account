<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14-Dec-17
 * Time: 12:36 AM
 */

switch ($_GET["print"]){

    case "print.bill";
        include_once "config/config.php";
        include_once "modules/get.global.function.php";
        include_once "modules/print/print.fee.bill.php";
        include_once "print/fees.bill.php";
    break;
}