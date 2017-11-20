<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:46 AM
 */

function get_expenditure_summary($conn){
    $summary="SELECT * FROM get_expenditure_summary";
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
            <td>".$c['Dr']."</td>
        </tr>
    ";
    }
}

function get_daily_expenses_transaction($conn){
   $transaction="SELECT * FROM get_expenditure_per_day";
   $transaction=$conn->query($transaction);
   while ($t=$transaction->fetch_assoc()){
       echo"
            <tr class='gradeX'>
                  <td>{$t['GL_date']}</td>
                  <td>{$t['ledger']}</td>
                  <td>{$t['refNo']}</td>
                  <td class='center'>{$t['qouteDr']}</td>
            </tr>
       ";
   }
}

function get_expenditure_book($conn){
    $cash="SELECT * FROM get_expenditure_book";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['ticketID']."</td>
            <td>".$c['yearID']."</td>
            <td>".$c['qouteDr']."</td>
            <td><a href='' class ='btn btn-mini btn-primary'>Remove</a></td>
        </tr>
    ";
    }
}

function get_expenditure_ledger_summary($conn){
    $cash="SELECT * FROM get_expenditure_book";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['ticketID']."</td>
            <td>".$c['yearID']."</td>
            <td>".$c['qouteDr']."</td>
            <td><a href='' class ='btn btn-mini btn-primary'>Remove</a></td>
        </tr>
    ";
    }
}


?>
<div class="row-fluid">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#expenses">Expenses</a></li>
        <li><a data-toggle="tab" href="#expenses-history">Expenses History</a></li>
        <li><a data-toggle="tab" href="#expenses-summary">Summary</a></li>
    </ul>
    <div class="tab-content">
        <div id="expenses" class="tab-pane fade in active">
            <div class="span5">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Expenses-info</h5>
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
                                        <?php expenditure_list($conn)?>
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
                                <label class="control-label">Cost Amount </label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="amount" type="text" placeholder="0.000" class="span11">
                                        <span class="add-on">GHc</span> </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="ticket" value="<?php echo $x=ticket_generator($length=4)."-".date('Y')."-".date('dm');?>">
                                <input type="hidden" name="transaction" value="expenditure">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span7">
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
                                <th>Transaction</th>
                                <th>Ref. No#</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php get_daily_expenses_transaction($conn);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="expenses-history" class="tab-pane fade">
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
                            <th>Transaction</th>
                            <th>Ref. No#</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php get_expenditure_book($conn);?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="expenses-summary" class="tab-pane fade">
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
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php get_expenditure_ledger_summary($conn);?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

