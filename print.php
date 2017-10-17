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

}