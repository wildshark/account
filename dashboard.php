<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 2:21 PM
 */
if (empty($_SESSION['userID'])){
    session_destroy();
    header("location: index.php");
}else{
    switch ($_GET['user']){
        case "logout";
            session_destroy();
            include_once "template/login.php";
            break;

        case "dashboard";
            include_once "config/config.php";
            include_once "template/home.php";
            break;

        case"expenditure";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Expenditure";
            $page->views="views/book/expenditure.details.php";
            include_once "template/form.php";
            break;

        case "pay.voucher";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Pay Voucher";
            $page->views="views/book/pay.voucher.details.php";
            include_once "template/form.php";
            break;

        case "cash.book";
            include_once "config/config.php";
            $page->contenttitle="Cash Book";
            $page->views="views/book/cash.book.details.php";
            include_once "template/form.php";
            break;

        case "bank.book";
            include_once "config/config.php";
            $page->contenttitle="Bank Book";
            $page->views="views/book/bank.book.details.php";
            include_once "template/form.php";
            break;

        case"fees.payment";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Fees Entry";
            $page->views="views/fees/fees.payment.php";
            include_once "template/form.php";
            break;

        case"fees.costing";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Fees Entry";
            $page->views="views/fees/fees.costing.php";
            include_once "template/form.php";
            break;

        default:
            include_once "config/config.php";
            include_once "template/home.php";
            break;
    }
}