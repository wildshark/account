<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 4:44 PM
 */

function payment($conn){
    $cash="SELECT * FROM get_payment_voucher";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['ticketID']."</td>
            <td>".$c['yearID']."</td>
            <td>".$c['amount']."</td>
        </tr>
    ";
    }
}
function summary_cashbook($conn){
    $cash="SELECT * FROM get_sum_gl_qoute";
    $cash=$conn->query($cash);
    $c=$cash->fetch_assoc();
    $debit=$c['qDr'];
    $credit=$c['qCr'];
    $bal=$debit-$credit;
    $x=ticket_generator($length=4)."-".date('Y')."-".date('dm');
    $_GET['ticketID']=$x;
    echo "
        <tr>
            <td>Date</td>
            <td>".date('d-m-Y')."</td>
        </tr>
        <tr>
            <td>Time</td>
            <td>".date('h:i:sa')."</td>
        </tr>
        <tr>
            <td>Transaction ID# </td>
            <td>".date('Y')."-".date('dm')."</td>
        </tr>
        <tr>
            <td>Bill Unpaid</td>
            <td>".$bal."</td>
        </tr>
        
    ";
}


?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Date </label>
                        <div class="controls">
                            <div  data-date="01-01-2017" class="input-append date datepicker">
                                <input name="date" type="date" value="01-01-2017"  data-date-format="dd-mm-yyyy" class="span11" >
                                <span class="add-on"><i class="icon-th"></i></span> </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Ref. No# </label>
                        <div class="controls">
                            <input name="ref" type="text" class="span11" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Semester </label>
                        <div class="controls">
                            <select name="semester">
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Transaction Type </label>
                        <div class="controls">
                            <select name="type">
                                <?php expenses_list($conn)?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description </label>
                        <div class="controls">
                            <input name="detail" type="text" class="span11" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Payment Type </label>
                        <div class="controls">
                            <select name="pay">
                                <option value="1">Cash</option>
                                <option value="2">Bank</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Amount </label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="amount" type="text" placeholder="0.000" class="span11">
                                <span class="add-on">GHc</span> </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="ticket" value="<?php echo $x=ticket_generator($length=4)."-".date('Y')."-".date('dm');?>">
                        <input type="hidden" name="transaction" value="voucher">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span6">
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
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php summary_cashbook($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="icon-th"></i></span>
                <h5>Data table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Ref. No#</th>
                        <th>Trans No#</th>
                        <th>Session</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php payment($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
