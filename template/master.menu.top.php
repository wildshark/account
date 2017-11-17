<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:52 PM
 */


if (!isset($_SESSION)){
    session_start();
}

function administrator(){
    
    echo"
         <ul>
            <li class='active'><a href='account.php?user=dashboard&error=0&alert=1'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
            <li><a href='account.php?user=course-data&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Programme List</span></a> </li>
            <li><a href='account.php?user=student-data&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Student Data</span></a> </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>School Fees</span></a>
                <ul>
                    <li><a href='account.php?user=fees.payment&error=0&alert=1'>Fees Payment</a></li>
                    <li><a href='account.php?user=fees.ledger&error=0&alert=1'>Fees Ledger</a></li>
                    <li><a href='account.php?user=fees.costing&error=0&alert=1'>Setup</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Payroll</span></a>
                <ul>
                    <li><a href='account.php?user=staff.payroll&error=0&alert=1'>Payroll</a></li>
                    <li><a href='account.php?user=staff.loan&error=0&alert=1'>Staff Loan</a></li>
                    <li><a href='account.php?user=staff.profile&error=0&alert=1'>Staff Account</a></li>
                </ul>
            </li>
            <li><a href='account.php?user=expenditure&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Expenditure</span></a> </li>
            <li><a href='account.php?user=pay.voucher&error=0&alert=1'><i class='icon icon-th'></i> <span>Pay Voucher</span></a></li>
            <li><a href='account.php?user=cash.book&error=0&alert=1'><i class='icon icon-fullscreen'></i> <span>Cash Book</span></a></li>
            <li><a href='account.php?user=bank.book&error=0&alert=1'><i class='icon icon-tint'></i> <span>Bank Book</span></a></li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Ledger</span></a>
                <ul>
                    <li><a href='account.php?user=general.ledger&error=0&alert=1'>General Ledger</a></li>
                    <li><a href='account.php?user=salary.control&error=0&alert=1'>Salary Control Ledger</a></li>
                    <li><a href='account.php?user=ious&error=0&alert=1'>ious</a></li>
                    <li><a href='form-wizard.html'>Form with Wizard</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Account</span></a>
                <ul>
                    <li><a href='account.php?user=capital.investments&error=0&alert=1'>Capital & Investments</a></li>
                    <li><a href='account.php?user=profit.loss&error=0&alert=1'>Profit & Loss</a></li>
                    <li><a href='account.php?user=investment&error=0&alert=1'>Investment</a></li>
                    <li><a href='form-wizard.html'>Trial Balance</a></li>
                </ul>
            </li>
        </ul>
    ";
}

function student_admission_entry(){
    echo"
            <ul>
                <li class='active'><a href='account.php?user=dashboard&error=0&alert=1'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
                <li><a href='account.php?user=course-data&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Course List</span></a> </li>
                <li><a href='account.php?user=student-data&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Student Data</span></a> </li>
                <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>School Fees</span></a>
                    <ul>
                        <li><a href='account.php?user=fees.payment&error=0&alert=1'>Fees Payment</a></li>
                        <li><a href='account.php?user=fees.ledger&error=0&alert=1'>Fees Ledger</a></li>
                        <li><a href='account.php?user=fees.costing&error=0&alert=1'>Setup</a></li>
                    </ul>
                </li>
            </ul>
    ";
}

function school_account_entry(){

    echo"
         <ul>
            <li class='active'><a href='account.php?user=dashboard&error=0&alert=1'><i class='icon icon-home'></i> <span>Dashboard</span></a> </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Payroll</span></a>
                <ul>
                    <li><a href='account.php?user=staff.payroll&error=0&alert=1'>Payroll</a></li>
                    <li><a href='account.php?user=staff.loan&error=0&alert=1'>Staff Loan</a></li>
                    <li><a href='account.php?user=staff.profile&error=0&alert=1'>Staff Account</a></li>
                </ul>
            </li>
            <li><a href='account.php?user=expenditure&error=0&alert=1'><i class='icon icon-inbox'></i> <span>Expenditure</span></a> </li>
            <li><a href='account.php?user=pay.voucher&error=0&alert=1'><i class='icon icon-th'></i> <span>Pay Voucher</span></a></li>
            <li><a href='account.php?user=cash.book&error=0&alert=1'><i class='icon icon-fullscreen'></i> <span>Cash Book</span></a></li>
            <li><a href='account.php?user=bank.book&error=0&alert=1'><i class='icon icon-tint'></i> <span>Bank Book</span></a></li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Ledger</span></a>
                <ul>
                    <li><a href='account.php?user=general.ledger&error=0&alert=1'>General Ledger</a></li>
                    <li><a href='account.php?user=salary.control&error=0&alert=1'>Salary Control Ledger</a></li>
                    <li><a href='account.php?user=ious&error=0&alert=1'>ious</a></li>
                    <li><a href='form-wizard.html'>Form with Wizard</a></li>
                </ul>
            </li>
            <li class='submenu'> <a href='#'><i class='icon icon-th-list'></i> <span>Account</span></a>
                <ul>
                    <li><a href='account.php?user=capital.investments&error=0&alert=1'>Capital And Investments</a></li>
                    <li><a href='account.php?user=profit.loss&error=0&alert=1'>Profit & Loss</a></li>
                    <li><a href='account.php?user=investment&error=0&alert=1'>Investment</a></li>
                    <li><a href='form-wizard.html'>Trial Balance</a></li>
                </ul>
            </li>
        </ul>
    ";
}


if ($_SESSION['roleID'] == 1){
    student_admission_entry();
}elseif ($_SESSION['roleID'] == 2){
    school_account_entry();
}elseif ($_SESSION['roleID'] == 3){
    administrator();
}