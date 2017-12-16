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

    case "fees.bill";
        include_once "config/config.php";
        include_once "modules/fees/fees.billing.php";
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

    case "payroll-validate";
    //insert into database
        include_once "config/config.php";
        include_once "modules/payroll/add.payroll.php";
        break;

    case "salary-cost";
        include_once "config/config.php";
        include_once "modules/salary_control/salary.control.cost.php";
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

    case "student.data";
        include_once "config/config.php";
       // include_once "modules/injectors/fees.sql.injection.php";
        include_once "modules/student/student.profile.php";
    break;

    case "course.data";
        include_once "config/config.php";
        include_once "modules/course/add.course.php";
        break;

    case "fees.data";
        include_once "config/config.php";
        include_once "modules/course/add.course.php";
        break;

    case "fees.costing";
       //echo "fees costing";
       include_once "config/config.php";
        include_once "modules/get.global.function.php";
       include_once "modules/fees/add.fees.costing.php";
    break;

    case "profit.loss";
        include_once "config/config.php";
        include_once "modules/profit_loss/profit.loss.php";
        $page->contenttitle="Income Statement";
        $page->views="views/profit_loss/profit.loss.calculate.php";
        include_once "template/form.php";
    break;

}
