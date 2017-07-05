<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 5:17 PM
 */
$staffID=$_GET['q'];
//entry S.S.F
$ssfValue='0.05';
//entry S.C.P
$salaryCostPercent='0.125';

if (empty($staffID)){
   echo "stop";// header("location:" .$_SERVER['HTTP_REFERER']);
}else{
    $_SESSION['staffID']=$staffID;

    $staff="SELECT * FROM get_staff_profile_list WHERE staff_profile_ID='$staffID'";
    $getStaff=$conn->query($staff);
    $s=$getStaff->fetch_assoc();

    $name=$s['staffName'];
    $basic=$s['basicPay'];
    $allowance=$s['allowance'];
    $acctName=$s['acctName'];
    $acctNo=$s['acctNumber'];
    $bank=$s['bank'];
    $bankID=$s['bank'];

    $getBank=$conn->query("SELECT * FROM bank_list WHERE bankID='$bank'");
    $b=$getBank->fetch_assoc();
    $bank=$b['bank'];

    //calculate SSF
    $ssf=$basic*$ssfValue;

    //Total Salary Cost
    $TotalSalaryCost=((($basic * $salaryCostPercent ) + $allowance )+ $basic);
    //Taxable salary
    $sub_total=$basic-$ssf;
    $taxable_salary=$sub_total+$allowance;
    //calculate Tax

    //Note GH216 is Free

    if ($basic >151) {
        $GH216 = "216";
        $GH108 = (108 * (5 / 100));
        $GH151 = (151 * (10 / 100));
        $GH2765 = ($taxable_salary - (216 + 108 + 151)) * 0.172;
        $total_paye=$GH108+$GH151+$GH2765;
        $net_salary=$taxable_salary-$total_paye;

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