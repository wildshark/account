<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 2:54 PM
 */

if (!isset($_SERVER)){
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
        $basic='Null';
    }else{
        $basic=$_SESSION['basic'];
    }
    if (empty($_SESSION['allowance'])){
        $allowance='Null';
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
        $ssf='Null';
    }else{
        $ssf=$_SESSION['ssf'];
    }
    if (empty($_SESSION['sub_total'])){
        $sub_total='Null';
    }else{
        $sub_total=$_SESSION['sub_total'];
    }
    if (empty($_SESSION['c261'])){
        $GH216='Null';
    }else{
        $GH216=$_SESSION['c261'];
    }
    if (empty($_SESSION['c108'])){
        $GH108='Null';
    }else{
        $GH108=$_SESSION['c108'];
    }
    if (empty($_SESSION['c151'])){
        $GH151='Null';
    }else{
        $GH151=$_SESSION['c151'];
    }
    if (empty($_SESSION['c2765'])){
        $GH2765='Null';
    }else{
        $GH2765=$_SESSION['c2765'];
    }
    if (empty($_SESSION['total_paye'])){
        $total_paye='Null';
    }else{
        $total_paye=$_SESSION['c2765'];
    }
    if (empty($_SESSION['net_salary'])){
        $net_salary='Null';
    }else{
        $net_salary=$_SESSION['net_salary'];
    }
    if (empty($_SESSION['taxable_salary'])){
        $taxable_salary='Null';
    }else{
        $taxable_salary=$_SESSION['taxable_salary'];
    }
    if (empty($_SESSION['TotalSalaryCost'])){
        $TotalSalaryCost='Null';
    }else{
        $TotalSalaryCost=$_SESSION['TotalSalaryCost'];
    }

   echo $payroll="INSERT INTO `payroll` (`payDate`, `staffID`, `basic`, `ssf`, `allowance`, `year`, `semester`, `bankID`, `acctName`, `AcctNo`, `GH216Free`, `GH108`, `GH151`, `GH2765`) 
VALUES ('2017-07-05', '$staffID', '$basic', '$ssf', '$allowance', '1', '1', '$bank', '$acctName', '$acctNo', '$GH216', '$GH108', '$GH151', '$GH2765')";
    $payroll=$conn->query($payroll);

}
