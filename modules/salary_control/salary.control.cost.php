<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 07-Aug-17
 * Time: 12:35 AM
 */

if (!$_GET['transaction'] == 'salary-cost'){
    header("location: account.php?user=staff.payroll&error=6&alert=1");
}else{

    $session = $_GET['school-session'];
    $semester = $_GET['school-semester'];

    $staffName = $_SESSION['name'];
    $staff_id=$_SESSION['staff_id'];
    //get payroll post date
    $pay_date=$_SESSION['date'];
    $payroll_date =date("Y-m-d", strtotime($pay_date));

    //format the payroll date to standard date
    $date=date_create($payroll_date);

    //display date in full word type as month only
    $month= date_format($date,"F");
    $year= date_format($date,"Y");

    $refNo="SC-".date_format($date,"m")."".date_format($date,"Y");

    $description= $staffName ." total salary cost for the month of ".$month." - year ".$year;

    $total_basic = $_SESSION['TotalBasic'];
    $total_allowance = $_SESSION['TotalAllowance'];
    $ssf = $_SESSION['ssf'];

    $net_salary = $total_basic + $total_allowance;
    $total_salary_cost = $_SESSION['TotalSalaryCost'];

    $control="INSERT INTO `general_legder` (`tranDate`, `GL_date`, `ticketID`, `bookID`, `tranCatID`, `description`, `refNo`,`qouteDr`, `qouteCr`,`tranTypeID`, `yearID`, `semesterID`, `salaryControlID`,`profitlossID`,`balanceSheetID`,`staffID`) 
 VALUES ('$tranDate', '$payroll_date', '01', '2', '7', '$description', '$refNo', '$total_salary_cost', '0.00','3','$year','$semester','1','2','3','$staff_id')";
    $result=$conn->query($control);
}
