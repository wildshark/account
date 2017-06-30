<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 2:27 PM
 */


switch ($_GET["transaction"]){
    case "expenditure";
        include_once "config/config.php";
        include_once "modules/expenditure/add.expenditure.record.php";
        break;

    case "voucher";
        include_once "config/config.php";
        include_once "modules/payment/add.pay.voucher.php";
        break;

    case "fees.e";
        include_once "config/config.php";
        include_once "modules/fees/add.fees.record.php";
        break;

    case "delete";
        include_once "config/config.php";
        include_once "modules/delete.record.php";
        break;

    case "search";
        include_once "config/config.php";
        include_once "modules/fees/search.fees.history.php";
        break;

}
