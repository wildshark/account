<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:16 PM
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
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Ref. No# </label>
                        <div class="controls">
                            <input name="ref" type="text" class="span11" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description </label>
                        <div class="controls">
                            <input name="detail" type="text" class="span11" />
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
                        <input type="hidden" name="ticket" value="">
                        <input type="hidden" name="transaction" value="search">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span7">
        <div class="widget-box">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Payment History</a></li>
                    <li><a data-toggle="tab" href="#tab2">Payment Slip</a></li>
                    <li><a data-toggle="tab" href="#tab3">Last Payment</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </p>

                </div>
                <div id="tab2" class="tab-pane">
                    <p> waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </p>
                    <form class="form-horizontal">
                        <div class="span6">
                            <div class="control-group">
                                <label>Course </label>
                                <select name="course">
                                    <?php course_list($conn);?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label>Payment Type </label>
                                <select name="course">
                                    <option value="1">Cash </option>
                                    <option value="2">Bank</option>
                                </select>
                            </div>

                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label>Ref. No# </label>
                                <input name="ref" type="text" class="span11" />
                            </div>
                            <div class="control-group">
                                <label>Description </label>
                                <input name="detail" type="text" class="span11" />
                            </div>
                            <div class="control-group">
                                <label >Amount </label>
                                <div >
                                    <div class="input-append">
                                        <input name="amount" type="text" placeholder="0.000" class="span11">
                                        <span class="add-on">GHc</span> </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="hidden" name="ticket" value="">
                            <input type="hidden" name="transaction" value="search">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>

                </div>
                <div id="tab3" class="tab-pane">
                    <p>full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end. </p>

                </div>
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