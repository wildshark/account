<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23-Sep-17
 * Time: 5:35 PM
 */

switch ($_GET['print-page']){
    case "print-fees-receipt";
        include_once "views/printout/receipt.php";
    break;
    case "print";
        include_once "config/config.php";
        include_once "modules/get.global.function.php";
        include_once "print/page.php";
    break;
    case "fees-invoice";
        include_once "config/config.php";
        include_once "modules/get.global.function.php";
        include_once "print/invoice.php";
    break;

    case"receipt";
        include_once "config/config.php";
        include_once "modules/get.global.function.php";
        $views="views/receipt.php";
        include_once "print/invoice.php";
    break;

    case'pos';
        include_once "config/config.php";
        include_once "modules/get.global.function.php";
        include_once "print/pos/pos.php";
    break;

}