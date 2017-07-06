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
function fees_details($conn,$student){
    $cash="SELECT * FROM get_fees_payment_history WHERE studentID='$student'";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){

        if ($c['payTypeID']==1){
            $payType="Cash";
        }elseif ($c['payTypeID']==2){
            $payType="Bank";
        }

        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['payDate']."</td>
            <td>".$c['course']."</td>
            <td>".$c['stud_level']."</td>
            <td>".$c['sch_session']."</td>
            <td>".$c['refNo']."</td>
            <td>".$payType."</td>
            <td>".$c['paid_amount']."</td>
            <td><a href='transaction.php?transaction=delete&c=fees.pay&data=".$c['payID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>       
        </tr>
    ";
    }
}
?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Tab1</a></li>
                    <li><a data-toggle="tab" href="#tab2">Tab2</a></li>
                    <li><a data-toggle="tab" href="#tab3">Tab3</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
                    <img src="img/demo/demo-image1.jpg" alt="demo-image"/></div>
                <div id="tab2" class="tab-pane"> <img src="img/demo/demo-image2.jpg" alt="demo-image"/>
                    <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
                </div>
                <div id="tab3" class="tab-pane">
                    <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. </p>
                    <img src="img/demo/demo-image3.jpg" alt="demo-image"/></div>
            </div>
        </div>
    </div>
    <div class="span5">
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
    <div class="span7">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Search Personal-info</h5>
            </div>
            <div class="widget-content nopadding">

                    <div class="control-group">
                        <label class="control-label">Staff Name </label>
                        <div class="controls">
                            <select name="q">
                                <?php staff_list($conn)?>
                            </select>
                        </div>
                    </div>
                <form class="form-horizontal">
                    <div class="form-actions">
                        <input type="hidden" name="ticket" value="pr">
                        <input type="hidden" name="transaction" value="payout">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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