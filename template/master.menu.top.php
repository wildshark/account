<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:52 PM
 */

include_once "dialogbox/fees.payment.inc";


if ( $roleID == 1){
    student_admission_entry($roleID);
}elseif ( $roleID == 2){
    school_account_entry($roleID);
}elseif ( $roleID == 3){
    administrator($roleID);
}else{
    session_unset();
    session_destroy();
    header("location: ../index.php");
}

function administrator($roleID){
    
    echo"
         <ul>
            <li class='active'><a href='account.php?user=dashboard&error=0&alert=1&c=".$roleID."'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
            <li><a href='account.php?user=course-data&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Programme List</span></a> </li>
            <li><a href='account.php?user=student-data&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Student Data</span></a> </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>School Fees</span></a>
                <ul>
                    <li><a href='account.php?user=fees.billing&error=0&alert=1&c=".$roleID."'>Create Bill</a></li>                  
                    <li><a href='account.php?user=fees.payment&error=0&alert=1&c=".$roleID."#myAlert' data-toggle=\"modal\">Payment</a></li>
                    <li><a href='account.php?user=fees.ledger&error=0&alert=1&c=".$roleID."'>Ledger</a></li>
                    <li><a href='account.php?user=fees.journal.book&error=0&alert=1&c=".$roleID."'>Revenue</a> </li>
                    <li><a href='account.php?user=fees.costing&error=0&alert=1&c=".$roleID."'>Setup</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Payroll</span></a>
                <ul>
                    <li><a href='account.php?user=staff.payroll&error=0&alert=1&c=".$roleID."'>Payroll</a></li>
                    <li><a href='account.php?user=staff.loan&error=0&alert=1&c=".$roleID."'>Staff Loan</a></li>
                    <li><a href='account.php?user=staff.profile&error=0&alert=1&c=".$roleID."'>Staff Account</a></li>
                </ul>
            </li>
            <li><a href='account.php?user=expenditure&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Expenditure</span></a> </li>
            <li><a href='account.php?user=pay.voucher&error=0&alert=1&c=".$roleID."'><i class='icon icon-th'></i> <span>Pay Voucher</span></a></li>
            <li><a href='account.php?user=cash.book&error=0&alert=1&c=".$roleID."'><i class='icon icon-fullscreen'></i> <span>Cash Book</span></a></li>
            <li><a href='account.php?user=bank.book&error=0&alert=1&c=".$roleID."'><i class='icon icon-tint'></i> <span>Bank Book</span></a></li>
            <li><a href='account.php?user=fees-revenue&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Fees Revenue</span></a> </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Ledger</span></a>
                <ul>
                    <li><a href='account.php?user=general.ledger&error=0&alert=1&c=".$roleID."'>General Ledger</a></li>
                    <li><a href='account.php?user=salary.control&error=0&alert=1&c=".$roleID."'>Salary Control Ledger</a></li>
                    <li><a href='account.php?user=ious&error=0&alert=1&c=".$roleID."'>ious</a></li>
                    <li><a href='form-wizard.html'>Form with Wizard</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Account</span></a>
                <ul>
                    <li><a href='account.php?user=capital.investments&error=0&alert=1&c=".$roleID."'>Capital & Investments</a></li>
                    <li><a href='account.php?user=profit.loss&error=0&alert=1&c=".$roleID."'>Profit & Loss</a></li>
                    <li><a href='account.php?user=investment&error=0&alert=1&c=".$roleID."'>Investment</a></li>
                    <li><a href='account.php?user=trial.balance&error=0&alert=1&c=".$roleID."'>Trial Balance</a></li>
                </ul>
            </li>
        </ul>
    ";
}

function student_admission_entry($roleID){
    echo"
            <ul>
                <li class='active'><a href='account.php?user=dashboard&error=0&alert=1&c=".$roleID."'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
                <li><a href='account.php?user=fees.costing&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Fees Setup</span></a> </li>
                <li><a href='account.php?user=course-data&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Course List</span></a> </li>
                <li><a href='account.php?user=student-data&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Student Data</span></a> </li>
                <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>School Fees</span></a>
                    <ul>
                        <li><a href='account.php?user=fees.billing&error=0&alert=1&c=".$roleID."'>Create Bill</a></li>
                        <li><a href='account.php?user=fees.payment&error=0&alert=1&c=".$roleID."'>Fees Payment</a></li>
                        <li><a href='account.php?user=fees.ledger&error=0&alert=1&c=".$roleID."'>Fees Ledger</a></li>
                        <li><a href='account.php?user=fees.journal.book&error=0&alert=1&c=".$roleID."'>Fees Book</a> </li>
                    </ul>
                </li>
            </ul>
    ";
}

function school_account_entry($roleID){

    echo"
         <ul>
            <li class='active'><a href='account.php?user=dashboard&error=0&alert=1&c=".$roleID."'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Payroll</span></a>
                <ul>
                    <li><a href='account.php?user=staff.payroll&error=0&alert=1&c=".$roleID."'>Payroll</a></li>
                    <li><a href='account.php?user=staff.loan&error=0&alert=1&c=".$roleID."'>Staff Loan</a></li>
                    <li><a href='account.php?user=staff.profile&error=0&alert=1&c=".$roleID."'>Staff Account</a></li>
                </ul>
            </li>
            <li><a href='account.php?user=expenditure&error=0&alert=1&c=".$roleID."'><i class='icon icon-inbox'></i> <span>Expenditure</span></a> </li>
            <li><a href='account.php?user=pay.voucher&error=0&alert=1&c=".$roleID."'><i class='icon icon-th'></i> <span>Pay Voucher</span></a></li>
            <li><a href='account.php?user=cash.book&error=0&alert=1&c=".$roleID."'><i class='icon icon-fullscreen'></i> <span>Cash Book</span></a></li>
            <li><a href='account.php?user=bank.book&error=0&alert=1&c=".$roleID."'><i class='icon icon-tint'></i> <span>Bank Book</span></a></li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Ledger</span></a>
                <ul>
                    <li><a href='account.php?user=general.ledger&error=0&alert=1&c=".$roleID."'>General Ledger</a></li>
                    <li><a href='account.php?user=salary.control&error=0&alert=1&c=".$roleID."'>Salary Control Ledger</a></li>
                    <li><a href='account.php?user=ious&error=0&alert=1&c=".$roleID."'>ious</a></li>
                    <li><a href='form-wizard.html'>Form with Wizard</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Account</span></a>
                <ul>
                    <li><a href='account.php?user=capital.investments&error=0&alert=1&c=".$roleID."'>Capital And Investments</a></li>
                    <li><a href='account.php?user=profit.loss&error=0&alert=1&c=".$roleID."'>Profit & Loss</a></li>
                    <li><a href='account.php?user=investment&error=0&alert=1&c=".$roleID."'>Investment</a></li>
                    <li><a href='form-wizard.html'>Trial Balance</a></li>
                </ul>
            </li>
        </ul>
        
        
    ";
}
?>


