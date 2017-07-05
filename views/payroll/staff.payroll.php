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
if (empty($_SESSION['bank'])){
    $bank='Null';
}else{
    $bank=$_SESSION['bank'];
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
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Search Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal">
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
    <div class="span4">
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
    <div class="span4">
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
    <div class="span4">
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
</div>