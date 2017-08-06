<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jul-17
 * Time: 9:12 AM
 */

function capital_sheet($conn){
    $cash="SELECT * FROM get_capital_book";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['tranTypeID']."</td>
            <td>".$c['yearID']."</td>
            <td>".$c['capital']."</td>
            <td>
                <a href='transaction.php?transaction=delete&c=pay&data=".$c['GL_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a>
                <a href='transaction.php?transaction=delete&c=pay&data=".$c['GL_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a>
                <a href='transaction.php?transaction=delete&c=pay&data=".$c['GL_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a>
            </td>
        </tr>
    ";
    }
}

function summary_capital($conn){
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
    <form class="form-horizontal">
        <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Staff Profile</a></li>
                    <li><a data-toggle="tab" href="#tab2">Salary</a></li>
                    <li><a data-toggle="tab" href="#tab3">Salary</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class="control-group">
                                <label class="control-label">Employ Date (dd-mm-yyy)</label>
                                <div class="controls">
                                    <input name="date" type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Staff ID# </label>
                                <div class="controls">
                                    <input name="staffid" type="text" class="span11" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Name </label>
                                <div class="controls">
                                    <input name="name" type="text" class="span11" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Position </label>
                                <div class="controls">
                                    <select name="position" class="span6">
                                        <?php position_list($conn)?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Work Status </label>
                                <div class="controls">
                                    <select name="work" class="span6">
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                </div>
                            </div>
                            <P></P>
                            <div class="form-actions">
                                <input type="hidden" name="ticket" value="">
                                <input type="hidden" name="transaction" value="staff">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class="control-group">
                                <label class="control-label">Basic Pay </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="basic" type="text" placeholder="0.000" class="span11">
                                        <span class="add-on">GHc</span> </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Allowance </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="allowance" type="text" placeholder="0.000" class="span11">
                                        <span class="add-on">GHc</span> </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Bank Name </label>
                                <div class="controls">
                                    <select name="bank" class="span5">
                                        <?php bank_name_list($conn)?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Account Name </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="acctName" type="text" placeholder="Account Name">
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Account Number </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="acctNo" type="text" placeholder="0000">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="ticket" value="">
                                <input type="hidden" name="transaction" value="staff">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane">
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
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php capital_sheet($conn)?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="span4">
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
                    <?php summary_capital($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

