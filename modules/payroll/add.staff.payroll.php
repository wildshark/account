<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 2:54 PM
 */

if (!isset($_SESSION)){
 echo "error";
}else{
    if (empty($_SESSION['staffID'])){
        $staffID="Null";
    }else{
        $staffID=$_SESSION['staffID'];
    }
    if (empty($_SESSION['name'])){
        $name='Null';
    }else{
        $name=$_SESSION['name'];
    }
    if (empty($_SESSION['basic'])){
        $basic='0.00';
    }else{
        $basic=$_SESSION['basic'];
    }
    if (empty($_SESSION['allowance'])){
        $allowance='0.00';
    }else{
        $allowance=$_SESSION['allowance'];
    }
    if (empty($_SESSION['acctName'])){
        $acctName='Null';
    }else{
        $acctName=$_SESSION['acctName'];
    }
    if (empty($_SESSION['acctNo'])){
        $acctNo='Null';
    }else{
        $acctNo=$_SESSION['acctNo'];
    }
    if (empty($_SESSION['bankID'])){
        $bank='Null';
    }else{
        $bank=$_SESSION['bankID'];
    }
    if (empty($_SESSION['ssf'])){
        $ssf='0.00';
    }else{
        $ssf=$_SESSION['ssf'];
    }
    if (empty($_SESSION['sub_total'])){
        $sub_total='0.00';
    }else{
        $sub_total=$_SESSION['sub_total'];
    }
    if (empty($_SESSION['c261'])){
        $GH216='0.00';
    }else{
        $GH216=$_SESSION['c261'];
    }
    if (empty($_SESSION['c108'])){
        $GH108='0.00';
    }else{
        $GH108=$_SESSION['c108'];
    }
    if (empty($_SESSION['c151'])){
        $GH151='0.00';
    }else{
        $GH151=$_SESSION['c151'];
    }
    if (empty($_SESSION['c2765'])){
        $GH2765='0.00';
    }else{
        $GH2765=$_SESSION['c2765'];
    }
    if (empty($_SESSION['total_paye'])){
        $total_paye='0.00';
    }else{
        $total_paye=$_SESSION['c2765'];
    }
    if (empty($_SESSION['net_salary'])){
        $net_salary='0.00';
    }else{
        $net_salary=$_SESSION['net_salary'];
    }
    if (empty($_SESSION['taxable_salary'])){
        $taxable_salary='0.00';
    }else{
        $taxable_salary=$_SESSION['taxable_salary'];
    }
    if (empty($_SESSION['TotalSalaryCost'])){
        $TotalSalaryCost='0.00';
    }else{
        $TotalSalaryCost=$_SESSION['TotalSalaryCost'];
    }

    if ($_GET['q'] == $staffID){
        $date=$_GET['date'];
        echo $payroll="INSERT INTO `payroll` (`payDate`, `staffID`, `basic`, `ssf`, `allowance`, `year`, `semester`, `bankID`, `acctName`, `AcctNo`, `GH216Free`, `GH108`, `GH151`, `GH2765`) 
VALUES ('$date', '$staffID', '$basic', '$ssf', '$allowance', '1', '1', '$bank', '$acctName', '$acctNo', '$GH216', '$GH108', '$GH151', '$GH2765')";
        $payroll=$conn->query($payroll);
    }else{
        exit();
        header("location : account.php?user=staff.payroll");

    }


}
