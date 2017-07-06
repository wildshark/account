<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05-Jul-17
 * Time: 10:36 PM
 */

 if (empty($_GET['staff'])) {

     function loan_data($conn)
     {
         $sql = "SELECT *FROM get_loan_calculator LIMIT 8";
         $loan = $conn->query($sql);
         while ($l = $loan->fetch_assoc()) {
             echo "
            <tr class='odd gradeX'>
                <td>" . $l['loanDate'] . "</td>
                <td>" . $l['staffName'] . "</td>
                <td>" . $l['loan'] . "</td>
                <td>" . $l['paidDateUpdate'] . "</td>
                <td class='center'>" . $l['paid'] . "</td>
                <td class='center'>" . $l['loan_bal'] . "</td>
                <td>" . $l['nMonth'] . "</td>
                <td><a href='transaction.php?transaction=delete&c=staff.loan&data=".$l['staff_loan_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>       
            </tr>      
        ";
         }
     }

     function loan_payment($conn)
     {
         $sql = "SELECT * FROM get_loan_payment";
         $pay = $conn->query($sql);
         while ($p = $pay->fetch_assoc()) {
             if ($p['semester'] == 1) {
                 $semester = "1st Semester";
             } elseif ($p['semester'] == 2) {
                 $semester = "2nd Semester";
             }
             echo "
            <tr class='odd gradeX'>
                <td>" . $p['date'] . "</td>
                <td>" . $p['staffName'] . "</td>
                <td>" . $semester . "</td>
                <td class='center'>" . $p['yearID'] . "</td>
                <td class='center'>" . $p['amount'] . "</td>
                <td><a href='transaction.php?transaction=delete&c=paid.loan&data=".$p['loanID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>       
            </tr>
        ";
         }
     }
 }else{
     $staffID=$_GET['staff'];
     function loan_data($conn,$staffID)
     {
         $sql = "SELECT *FROM get_loan_calculator WHERE staffID='$staffID'";
         $loan = $conn->query($sql);
         while ($l = $loan->fetch_assoc()) {
             echo "
            <tr class='odd gradeX'>
                <td>" . $l['loanDate'] . "</td>
                <td>" . $l['staffName'] . "</td>
                <td>" . $l['loan'] . "</td>
                <td>" . $l['paidDateUpdate'] . "</td>
                <td class='center'>" . $l['paid'] . "</td>
                <td class='center'>" . $l['loan_bal'] . "</td>
                <td>" . $l['nMonth'] . "</td>
                <td><a href='transaction.php?transaction=delete&c=staff.loan&data=".$l['staff_loan_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>      
        ";
         }
     }

     function loan_payment($conn,$staffID)
     {
         $sql = "SELECT * FROM get_loan_payment WHERE staffID='$staffID'";
         $pay = $conn->query($sql);
         while ($p = $pay->fetch_assoc()) {
             if ($p['semester'] == 1) {
                 $semester = "1st Semester";
             } elseif ($p['semester'] == 2) {
                 $semester = "2nd Semester";
             }
             echo "
            <tr class='odd gradeX'>
                <td>" . $p['date'] . "</td>
                <td>" . $p['staffName'] . "</td>
                <td>" . $semester . "</td>
                <td class='center'>" . $p['yearID'] . "</td>
                <td class='center'>" . $p['amount'] . "</td>
            </tr>
        ";
         }
     }
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
                        <label class="control-label">Staff Name </label>
                        <div class="controls">
                            <select name="staff">
                                <?php staff_list($conn)?>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="ticket" value="1">
                        <input type="hidden" name="user" value="staff.loan">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="account.php?user=staff.loan"  class="btn btn-success">New</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab1">Collect Loan</a></li>
                    <li><a data-toggle="tab" href="#tab2">Pay Loan</a></li>
                    <li><a data-toggle="tab" href="#tab3">Loan Details</a></li>
                </ul>
            </div>
            <div class="widget-content tab-content">
                <div id="tab1" class="tab-pane active">
                    <div class="span5">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Personal-info</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Date (dd-mm-yyy)</label>
                                        <div class="controls">
                                            <input name="date" type="text" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Staff Name </label>
                                        <div class="controls">
                                            <select name="staff">
                                                <?php staff_list($conn)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Session </label>
                                        <div class="controls">
                                            <select name="year">
                                                <?php year_list($conn)?>
                                            </select>
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
                                        <label class="control-label">Description </label>
                                        <div class="controls">
                                            <input name="detail" type="text" class="span11" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Amount </label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input name="payment" type="text" placeholder="0.000" class="span11">
                                                <span class="add-on">GHc</span> </div>
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
                                        <input type="hidden" name="transaction" value="loan">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="span7">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>Static table</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Staff Name</th>
                                        <th>Loan</th>
                                        <th>last Paid Date</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>month Left</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (empty($_GET["ticket"])){
                                        loan_data($conn);
                                    }else{
                                        loan_data($conn,$staffID);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="span5">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Personal-info</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Date (dd-mm-yyy)</label>
                                        <div class="controls">
                                            <input name="date" type="text" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Staff Name </label>
                                        <div class="controls">
                                            <select name="staff">
                                                <?php staff_list($conn)?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Session </label>
                                        <div class="controls">
                                            <select name="year">
                                                <?php year_list($conn)?>
                                            </select>
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
                                        <label class="control-label">Amount </label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input name="payment" type="text" placeholder="0.000" class="span11">
                                                <span class="add-on">GHc</span> </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="ticket" value="">
                                        <input type="hidden" name="transaction" value="pay.loan">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="span7">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                                <h5>Static table</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Staff Name</th>
                                        <th>Semester</th>
                                        <th>Year</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (empty($_GET['ticket'])){
                                        loan_payment($conn);
                                    }else{
                                        loan_payment($conn,$staffID);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane">
                    <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment. </p>
                    <img src="img/demo/demo-image3.jpg" alt="demo-image"/></div>
            </div>
        </div>
    </div>
</div>
