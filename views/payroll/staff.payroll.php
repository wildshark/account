<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 2:57 PM
 */

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
if (empty($_SESSION['bank'])){
    $bank='Null';
}else{
    $bank=$_SESSION['bank'];
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
if (empty($_SESSION['loanDate'])){
    $loanDate="";
}else{
    $loanDate=$_SESSION['loanDate'];
}
if (empty($_SESSION['loan'])){
    $loan='0.00';
}else{
    $loan=$_SESSION['loan'];
}
if (empty($_SESSION['loan_paid'])){
    $paid_loan='0.00';
}else{
    $paid_loan=$_SESSION['loan_paid'];
}
if (empty($_SESSION['due_amount'])){
    $due_amount='0.00';
}else{
    $due_amount=$_SESSION['due_amount'];
}
if (empty($_SESSION['loanBal'])){
    $loanBal='0.00';
}else{
    $loanBal=$_SESSION['loanBal'];
}

function payroll_details($conn,$staffID){
    $payroll="SELECT * FROM get_payroll WHERE staffID='$staffID'";
    $payroll=$conn->query($payroll);
    while ($p=$payroll->fetch_assoc()){

        echo "
        <tr class='gradeX'>
            <td class='center'>".$p['payDate']."</td>
            <td>".$p['basic']."</td>
            <td>".$p['allowance']."</td>
            <td>".$p['ssf']."</td>
            <td>".$p['Sub_Total']."</td>
            <td>".$p['Taxable_salary']."</td>
            <td>".$p['Totalpaye']."</td>
            <td>".$p['net_salary']."</td>
            <td>".$p['bankID']."</td>
            <td>".$p['acctName']."</td>
            <td>".$p['AcctNo']."</td>
            <td><a href='transaction.php?transaction=delete&c=fees.pay&data=".$p['payrollID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>       
        </tr>
    ";
    }
}

function total_salary_cost($conn){

    //get the last date of the month and
  //  $date = new DateTime('now');
  //  $date->modify('last day of this month');
  //  $payDate= $date->format('Y-m-d');

    $total_salary_cost = "SELECT * FROM get_total_salary_calculation WHERE payDate='31-08-2017'";
    $salary_cost = $conn->query($total_salary_cost);
    $s = $salary_cost->fetch_assoc();
    echo "
            <tr>
                <td>Total Basic</td>
                <td>".$s['TotalBasic']."</td>
            </tr>
            <tr>
                <td>All Allowances</td>
                <td>".$s['TotalAllowance']."</td>
            </tr>
                <td>Total Income Tax</td>
                <td>".$s['ssf']."</td>
            </tr>
            <tr>
                <td>Total Salary Cost</td>
                <td>".$s['TotalSalaryCost']."</td>
            </tr>          
    ";
}
?>
<div class="row-fluid">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Search Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Pay Date (dd-mm-yyy)</label>
                        <div class="controls">
                            <input name="date" type="text" data-date="<?php echo date("d-m-Y")?>" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Staff Name </label>
                        <div class="controls">
                            <select name="q">
                                <?php staff_list($conn)?>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="ticket" value="">
                        <input type="hidden" name="transaction" value="payroll">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title">
								<span class="icon">
									<i class="icon-info-sign"></i>
								</span>
                <h5>Numeric validation</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" name="number_validate" id="number_validate" novalidate="novalidate">
                    <div class="control-group">
                        <label class="control-label">Session</label>
                        <div class="controls">
                            <select name="school-session">
                                <?php school_session($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Semester</label>
                        <div class="controls">
                            <select name="school-semester">
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input name="transaction" type="submit" class="btn btn-primary" value="payroll-validate" >
                        <input name='' type="submit" value="Validate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="span3">
        <div class="widget-box">
            <div class="widget-title">
								<span class="icon">
									<i class="icon-eye-open"></i>
								</span>
                <h5>Browesr statistics</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Browser</th>
                        <th>Visits</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php total_salary_cost($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Payroll</a></li>
                    <li><a data-toggle="tab" href="#tab2">Salary Summary</a></li>
                    <li><a data-toggle="tab" href="#tab3">Loan summary</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <div class="row-fluid">
                        <div class="span3">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="icon-file"></i>
                                    </span>
                                    <h5>Visited Pages</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">Basic Pay</a></td>
                                            <td><?php echo $basic;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Allowance</a></td>
                                            <td><?php echo $allowance;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">S.S.F</a></td>
                                            <td><?php echo $ssf;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Sub Total</a></td>
                                            <td><?php echo $sub_total;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Taxable Salary</a></td>
                                            <td><?php echo $taxable_salary;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="icon-file"></i>
                                    </span>
                                    <h5>Visited Pages</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">GH216 FREE</a></td>
                                            <td><?php echo $GH216;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">GH108</a></td>
                                            <td><?php echo $GH108;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">GH151</a></td>
                                            <td><?php echo $GH151;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">GH2765</a></td>
                                            <td><?php echo $GH2765;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Total Paye</a></td>
                                            <td><?php echo $total_paye;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="icon-file"></i>
                                    </span>
                                    <h5>Visited Pages</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">Net Salary</a></td>
                                            <td><?php echo $net_salary;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Total Salary Cost</a></td>
                                            <td><?php echo $TotalSalaryCost;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Bank Name</a></td>
                                            <td><?php echo $bank;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Account Name</a></td>
                                            <td><?php echo $acctName;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Account Number</a></td>
                                            <td><?php echo $acctNo;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon">
                                        <i class="icon-file"></i>
                                    </span>
                                    <h5>Visited Pages</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><a href="#">Date</a></td>
                                            <td><?php echo $loanDate;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Loan Amount</a></td>
                                            <td><?php echo $loan;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Paid Amount</a></td>
                                            <td><?php echo $paid_loan;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Due Payment</a></td>
                                            <td><?php echo $due_amount;?></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Balance</a></td>
                                            <td><?php echo $loanBal;?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Static table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Basic</th>
                                    <th>Allowance</th>
                                    <th>S.S.F</th>
                                    <th>Sub Total</th>
                                    <th>Taxable Salary</th>
                                    <th>Total Paye</th>
                                    <th>Net Salary</th>
                                    <th>Bank</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php payroll_details($conn,$staffID) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Static table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Basic</th>
                                    <th>Allowance</th>
                                    <th>S.S.F</th>
                                    <th>Sub Total</th>
                                    <th>Taxable Salary</th>
                                    <th>Total Paye</th>
                                    <th>Net Salary</th>
                                    <th>Bank</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php payroll_details($conn,$staffID) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
