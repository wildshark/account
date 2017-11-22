<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 5:17 PM
 */

if (empty($_GET['q'])){
    header("location: account.php?user=staff.payroll&error=5&alert=3");
}elseif (empty($_GET['date'])){
    header("location: account.php?user=staff.payroll&error=5&alert=3");
}else{
    $staffID=$_GET['q'];
    $date=$_GET['date'];

//entry S.S.F
    $ssfValue='0.05';
//entry S.C.P
    $salaryCostPercent='0.125';

    if (empty($staffID)){
        header("location:" .$_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['staffID']=$staffID;

        $staff="SELECT * FROM get_staff_profile_list WHERE staff_profile_ID='$staffID'";
        $getStaff=$conn->query($staff);
        $s=$getStaff->fetch_assoc();

        $staff_id=$s['staff_profile_ID'];
        $name=$s['staffName'];
        $basic=$s['basicPay'];
        $allowance=$s['allowance'];
        $acctName=$s['acctName'];
        $acctNo=$s['acctNumber'];
        $bank=$s['bankID'];
        $bankID=$s['bankID'];

        //check and get bank details
        $getBank=$conn->query("SELECT * FROM bank_list WHERE bankID='$bank'");
        $b=$getBank->fetch_assoc();
        $bank=$b['bank_prefix'];

        //chack and get loan details
        echo $getLoan="SELECT * FROM get_loan_calculator WHERE statusID='1' AND staffID='$staffID'";
        $getLoan=$conn->query($getLoan);
        $l=$getLoan->fetch_assoc();
        $loanDate= $date;
        $loanPayAmount=$l['pay_amount'];
        $loan=$l['loan'];
        $paid_loan=$l['paid'];
        $loanBal=$l['loan_bal'];

        if ($loanBal == 0 or empty($loanBal)){
            $_SESSION['loanDate'] = $loanDate ="";
            $_SESSION['loan']=$loan = "0.00";
            $_SESSION['loan_paid'] = $paid_loan = "0.00";
            $_SESSION['due_amount'] = $loanPayAmount = "0.00";
            $_SESSION['loanBal'] = $loanBal = "0.00";
        }else{
            $_SESSION['loanDate'] = $loanDate;
            $_SESSION['loan'] = $loan;
            $_SESSION['loan_paid'] = $paid_loan;
            $_SESSION['due_amount'] = $loanPayAmount;
            $_SESSION['loanBal'] = $loanBal;
        }

        //calculate SSF
        $ssf = $basic * $ssfValue;

        //Total Taxable salary
        $sub_total = $basic - $ssf;

        //Total Salary Cost
        $TotalSalaryCost= ((($basic * $salaryCostPercent ) + $allowance ) + $basic);

        //Taxable calculate Tax
        $taxable_salary=$sub_total+$allowance;

        //Note GH216 is Free

        if ($basic >151) {
            $GH216 = "216";
            $GH108 = (108 * (5 / 100));
            $GH151 = (151 * (10 / 100));
            $GH2765 = ($taxable_salary - (216 + 108 + 151)) * 0.172;
            $total_paye=$GH108+$GH151+$GH2765;
            $net_salary=$taxable_salary-$total_paye;

            $_SESSION['date']=$date;
            $_SESSION['staff_id']=$staff_id;
            $_SESSION['name']=$name;
            $_SESSION['basic']=$basic;
            $_SESSION['allowance']=$allowance;
            $_SESSION['acctName']=$acctName;
            $_SESSION['acctNo']=$acctNo;
            $_SESSION['bank']=$bank;
            $_SESSION['bankID']=$bankID;

            $_SESSION['ssf']=$ssf;
            $_SESSION['sub_total']=$sub_total;
            $_SESSION['taxable_salary']=$taxable_salary;

            $_SESSION['c261']=$GH216;
            $_SESSION['c108']=$GH108;
            $_SESSION['c151']=$GH151;
            $_SESSION['c2765']=$GH2765;

            $_SESSION['total_paye']=$total_paye;
            $_SESSION['net_salary']=$net_salary;
            $_SESSION['TotalSalaryCost']=$TotalSalaryCost;

            header("location:" .$_SERVER['HTTP_REFERER']);
        }
    }
}
