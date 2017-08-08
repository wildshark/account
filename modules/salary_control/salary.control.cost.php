<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 07-Aug-17
 * Time: 12:35 AM
 */

$total_basic = $_SESSION['TotalBasic'];
$total_allowance = $_SESSION['TotalAllowance'];
$ssf = $_SESSION['SSF'];

$net_salary = $total_basic + $total_allowance;
$total_salary_cost = $_SESSION['TotalSalaryCost'];

$control="INSERT INTO `general_legder` (`tranDate`, `GL_date`, `ticketID`, `bookID`, `tranCatID`, `description`, `refNo`,
 `qouteDr`, `qouteCr`, `cashDr`, `cashCr`, `bankDr`, `bankCr`, `tranTypeID`, `yearID`, `semesterID`, `advance_payID`) 
 VALUES ('$tranDate', '$date', '1', '1', '1', '1', '1', '0.001', '0.001', '0.001', '0.001', '0.001', '0.001', '1', '1', '1', '11')";