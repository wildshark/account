<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 05-Jul-17
 * Time: 10:36 PM
 */

 if (empty($_GET['staff'])) {

     function loan_data($conn){

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

     function loan_payment($conn){

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
     function loan_data($conn,$staffID){

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

     function loan_payment($conn,$staffID){

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
                                        <label class="control-label">Monthly Pay Amount </label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input name="payment" type="text" placeholder="0.000" class="span11">
                                                <span class="add-on">GHc</span> </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Loan Amount </label>
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
                                                <input name="payment" type="text" placeholder="0.00" class="span11">
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
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="gradeX">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">4</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <td class="center">5.5</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 6</td>
                                        <td>Win 98+</td>
                                        <td class="center">6</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td class="center">7</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Trident</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td class="center">6</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.7</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td class="center">1.9</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td class="center">1.7</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td class="center">1.7</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.1</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.2</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.2</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.3</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.3</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.4</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.4</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.5</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.5</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.6</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.6</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.7</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td class="center">1.7</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.8</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Seamonkey 1.1</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Epiphany 2.20</td>
                                        <td>Gnome</td>
                                        <td class="center">1.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 1.2</td>
                                        <td>OSX.3</td>
                                        <td class="center">125.5</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 1.3</td>
                                        <td>OSX.3</td>
                                        <td class="center">312.8</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 2.0</td>
                                        <td>OSX.4+</td>
                                        <td class="center">419.3</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 3.0</td>
                                        <td>OSX.4+</td>
                                        <td class="center">522.1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>OmniWeb 5.5</td>
                                        <td>OSX.4+</td>
                                        <td class="center">420</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>iPod Touch / iPhone</td>
                                        <td>iPod</td>
                                        <td class="center">420.1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>S60</td>
                                        <td>S60</td>
                                        <td class="center">413</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 7.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 7.5</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 8.0</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 8.5</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 9.0</td>
                                        <td>Win 95+ / OSX.3+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 9.2</td>
                                        <td>Win 88+ / OSX.3+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera 9.5</td>
                                        <td>Win 88+ / OSX.3+</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Opera for Wii</td>
                                        <td>Wii</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Nokia N800</td>
                                        <td>N800</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Presto</td>
                                        <td>Nintendo DS browser</td>
                                        <td>Nintendo DS</td>
                                        <td class="center">8.5</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>KHTML</td>
                                        <td>Konqureror 3.1</td>
                                        <td>KDE 3.1</td>
                                        <td class="center">3.1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>KHTML</td>
                                        <td>Konqureror 3.3</td>
                                        <td>KDE 3.3</td>
                                        <td class="center">3.3</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>KHTML</td>
                                        <td>Konqureror 3.5</td>
                                        <td>KDE 3.5</td>
                                        <td class="center">3.5</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Tasman</td>
                                        <td>Internet Explorer 4.5</td>
                                        <td>Mac OS 8-9</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.1</td>
                                        <td>Mac OS 7.6-9</td>
                                        <td class="center">1</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.2</td>
                                        <td>Mac OS 8-X</td>
                                        <td class="center">1</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Misc</td>
                                        <td>NetFront 3.1</td>
                                        <td>Embedded devices</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Misc</td>
                                        <td>NetFront 3.4</td>
                                        <td>Embedded devices</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Misc</td>
                                        <td>Dillo 0.8</td>
                                        <td>Embedded devices</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Misc</td>

                                        <td>Links</td>
                                        <td>Text only</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td>Misc</td>
                                        <td>Lynx</td>
                                        <td>Text only</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Misc</td>
                                        <td>IE Mobile</td>
                                        <td>Windows Mobile 6</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeC">
                                        <td>Misc</td>
                                        <td>PSP browser</td>
                                        <td>PSP</td>
                                        <td class="center">-</td>
                                    </tr>
                                    <tr class="gradeU">
                                        <td>Other browsers</td>
                                        <td>All others</td>
                                        <td>-</td>
                                        <td class="center">-</td>
                                    </tr>
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
</div>
