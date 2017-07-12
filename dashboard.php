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
            $page->chart= "modules/dashboard.chart.php";
            include_once "modules/get.account.query.function.php";
            include_once "modules/dashboard.function.php";
            $page->views="views/dashboard.views.php";
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

        case "ious";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Fees Entry";
            $page->views="views/ledger/ious.ledger.php";
            include_once "template/form.php";
            break;

        case "advance.payment";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Advance Payment";
            $page->views="views/ledger/advance.payments.ledger.php";
            include_once "template/form.php";
            break;

        case "fees.ledger";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Fees Ledger ";
            $page->views="views/ledger/fees.ledger.book.php";
            include_once "template/form.php";
            break;

        case "capital.investments";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Capital Investments ";
            $page->views="views/book/income.capital.book.php";
            include_once "template/form.php";
            break;

        case"staff.profile";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Staff Profile ";
            $page->views="views/payroll/staff.profile.php";
            include_once "template/form.php";
            break;

        case"staff.payroll";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Staff Payroll";
            $page->views="views/payroll/staff.payroll.php";
            include_once "template/form.php";
            break;

        case "staff.loan";
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle="Staff Loan";
            $page->views="views/payroll/staff.loan.php";
            include_once "template/form.php";
            break;

        case "view.ledger"; //view ledger details
            $label=$_SESSION['ledger'];
            include_once "config/config.php";
            include_once "modules/get.account.query.function.php";
            $page->contenttitle=$label." Ledger";
            $page->views="views/ledger/ledger.details.php";
            include_once "template/form.php";
            break;
        default:
            include_once "config/config.php";
            include_once "template/home.php";
            break;
    }
}