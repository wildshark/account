<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 4:44 PM
 */


function get_payment_voucher_summary($conn){
    $summary="SELECT * FROM get_payment_voucher_summary";
    $summary=$conn->query($summary);
    while ($c=$summary->fetch_assoc()){
        $semesterID=$c['semesterID'];
        if ($semesterID == 1){
            $semester= "1st Semester";
        }elseif ($semesterID == 2){
            $semester= "2nd Semester";
        }

        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['ledger']."</td>
            <td>".$c['yearID']."</td>
            <td>".$semester."</td>
            <td>".$c['cash']."</td>
            <td>".$c['bank']."</td>
            <td>".$c['amount']."</td>
        </tr>
    ";
    }
}

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
            <td><a href='account.php?delete=pay-voucher&id=".$c['GL_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
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
    $cash=$c['cCr'];
    $bank=$c['bCr'];
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
            <td>Payment via Bank</td>
            <td>".$bank."</td>
        </tr>
        <tr>
            <td>Payment via Cash</td>
            <td>".$cash."</td>
        </tr>
        <tr>
            <td>Bill Unpaid</td>
            <td>".$bal."</td>
        </tr>
        
    ";
}


?>
<div class="row-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#fees-costing">Payment Voucher</a></li>
        <li><a data-toggle="tab" href="#local-student">Voucher History</a></li>
        <li><a data-toggle="tab" href="#summary">Summary</a></li>
    </ul>
    <div class="tab-content">
        <div id="fees-costing" class="tab-pane fade in active">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Personal-info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Date (dd-mm-yyy)</label>
                                <div class="controls">
                                    <input name="date" type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
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
                                    <select name="expenses">
                                        <?php expenses_due_for_payment_list($conn)?>
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
                                        <option value="1" class="active" >Cash</option>
                                        <option value="2">Bank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Payment Status</label>
                                <div class="controls">
                                    <select name="advance-pay">
                                        <option value="1" class="active"> Not Advance Payment</option>
                                        <option value="2">Advance Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Amount </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="amount" type="number" placeholder="0.000" class="span11">
                                        <span class="add-on">GHc</span> </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="ticket" value="<?php echo $x=ticket_generator($length=4)."-".date('Y')."-".date('dm');?>">
                                <input type="hidden" name="transaction" value="voucher">
                                <button type="submit" class="btn btn-success pull-right">Save</button>
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
        <div id="local-student" class="tab-pane fade">
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php payment($conn)?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="summary" class="tab-pane fade">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>Ledger</th>
                            <th>Year</th>
                            <th>Session</th>
                            <th>Cash</th>
                            <th>Bank</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php get_payment_voucher_summary($conn)?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

