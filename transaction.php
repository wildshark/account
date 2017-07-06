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

    case"fees.payment";
        include_once "config/config.php";
        include_once "modules/fees/add.fees.payment.php";
        break;

    case"capital";
        include_once "config/config.php";
        include_once "modules/payment/add.income.capital.php";
        break;

    case"drawings";
        include_once "config/config.php";
        include_once "modules/payment/drawings.income.capital.php";
        break;

    case "search";
        include_once "config/config.php";
        include_once "modules/fees/search.fees.history.php";
        break;

    case "staff";
        include_once "config/config.php";
        include_once "modules/payroll/add.staff.profile.php";
        break;

    case"payroll";
    //calculate payroll
        include_once "config/config.php";
        include_once "modules/payroll/calculate.payroll.php";
        break;
    case "payout";
        include_once "config/config.php";
        include_once "modules/payroll/add.staff.payroll.php";
        break;
    case "loan";
        include_once "config/config.php";
        include_once "modules/payroll/add.staff.loan.php";
        break;
    case "pay.loan";
        include_once "config/config.php";
        include_once "modules/payroll/add.staff.pay.loan.php";
        break;
}
