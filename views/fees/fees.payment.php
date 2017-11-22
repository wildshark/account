<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:16 PM
 */
if (empty($_SESSION['studentID'])){
    $student_id='Null';
}else{
    $student_id=$_SESSION['studentID'];
}
if (empty($_SESSION['name'])){
    $name='Null';
}else{
    $name=$_SESSION['name'];
}
if (empty($_SESSION['admission'])){
   $admission='Null';
}else{
    $admission=$_SESSION['admission'];
}

if (empty($_SESSION['fees'])){
    $fees='Null';
}else{
    $fees=$_SESSION['fees'];
}
if (empty($_SESSION['paid'])){
    $paid='Null';
}else{
    $paid=$_SESSION['paid'];
}
if (empty($_SESSION['bal'])){
    $bal='Null';
}else{
    $bal=$_SESSION['bal'];
}
if(empty($_SESSION['student_category'])){
    $student_category='Null';
}else{
    $student_category=$_SESSION['student_category'];
}

function fees_details($conn,$student_id){

    If ($student_id == "Null") {
        exit();
    } else {
        $cash = "SELECT * FROM get_fees_payment_history WHERE studentID='$student_id'";
        $cash = $conn->query($cash);
        while ($c = $cash->fetch_assoc()) {

            if ($c['payTypeID'] == 1) {
                $payType = "Cash";
            } elseif ($c['payTypeID'] == 2) {
                $payType = "Bank";
            }

            echo "
                    <tr class='gradeX'>
                        <td class='center'>" . $c['tranDate'] . "</td>
                        <td class='center'>" . $c['payDate'] . "</td>
                        <td>".$c['studentName']."</td>
                        <td>".$c['admissionNo']."</td>
                        <td>" . $c['stud_level'] . "</td>
                        <td>" . $c['sch_session'] . "</td>
                        <td>" . $c['refNo'] . "</td>
                        <td>" . $payType . "</td>
                        <td>" . $c['paid_amount'] . "</td>
                        <td>
                            <a href='transaction.php?transaction=delete&c=fees.pay&data=" . $c['payID'] . "' class='tip-top' data-original-title='Delete'><button class=\"btn btn-danger btn-mini\">Delete</button></a>
                        </td>       
                    </tr>
                ";
        }

    }
}


    $student_data=$conn->query("SELECT * FROM get_student_profile WHERE studentID='$student_id'");
    $d=$student_data->fetch_assoc();
    $course=$d['courseID'];
    $yearID=$d['admissionYr'];

    $student_school=$conn->query("SELECT * FROM get_course_list WHERE courseID='$course'");
    $s=$student_school->fetch_assoc();
    $course=$s['course'];
    $school=$s['prefix'];

function summary_details($conn,$student_id){

    If ($student_id == "Null") {
        exit();
    } else {
        $summary = "SELECT * FROM get_fees_summary WHERE studentID='$student_id'";
        $summary = $conn->query($summary);
        while ($s = $summary->fetch_assoc()) {
            echo "
                  <tr class='gradeX'>
                      <td>".$s['studentName']."</td>
                     <td>".$s['admissionNo']."</td>
                     <td>" . $s['sch_session'] . "</td>
                     <td>" . $s['stud_level'] . "</td>
                     <td>" . $s['fees'] . "</td>
                     <td>" . $s['payment'] . "</td>
                     <td>" . $s['balance'] . "</td>     
                  </tr>  
                ";
        }

    }
}
?>
<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#fees-costing">Fees Payment</a></li>
            <li><a data-toggle="tab" href="#local-student">Payment History</a></li>
            <li><a data-toggle="tab" href="#summary">Summary</a></li>
        </ul>
        <div class="tab-content">
            <div id="fees-costing" class="tab-pane fade in active">
                <div class="span5">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Search Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Admission Number </label>
                                    <div class="controls">
                                        <select name="q">
                                            <option value=""></option>
                                            <?php student_list($conn)?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="hidden" name="ticket" value="">
                                    <input type="hidden" name="transaction" value="search">
                                    <button type="submit" class="btn btn-success">Search</button>
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
                                <li><a data-toggle="tab" href="#tab2">New Student Payment Slip</a></li>
                                <li><a data-toggle="tab" href="#tab3">Continuing Student Payment Slip</a></li>
                            </ul>
                        </div>
                        <div class="widget-content tab-content">
                            <div id="tab1" class="tab-pane active">
                                <form class="form-horizontal">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Name: <b><?php echo $name;?></b> </label>
                                        </div>
                                        <div class="control-group">
                                            <label>Admission No#: <b><?php echo $admission;?></b> </label>
                                        </div>
                                        <div class="control-group">
                                            <label>Programme : <b><?php echo $course;?></b> </label>
                                        </div>
                                        <div class="control-group">
                                            <label>School : <b><?php echo $school;?></b> </label>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Total Fees: <b><?php echo $fees;?></b> </label>
                                        </div>
                                        <div class="control-group">
                                            <label>Total Payment: <b><?php echo $paid;?></b> </label>
                                        </div>
                                        <div class="control-group">
                                            <label>Balance: <b><?php echo $bal;?></b> </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="tab2" class="tab-pane">
                                <p> Key in Detail payment for New Student, </p>
                                <form class="form-horizontal">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Student Name </label>
                                            <input name="student" type="text" disabled value="<?php echo $name;?>" class="span11" />
                                        </div>

                                        <div class="control-group">
                                            <label>School </label>
                                            <select name="school">
                                                <?php school_list($conn);?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Session </label>
                                            <select name="session">
                                                <option value=""></option>
                                                <?php year_list($conn);?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Semester </label>
                                            <select name="semester">
                                                <option value="1">1st Semester </option>
                                                <option value="2">2nd Semester </option>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Level </label>
                                            <select name="level">
                                                <option value="100">Level 100 </option>
                                                <option value="200">Level 200</option>
                                                <option value="300">Level 300</option>
                                                <option value="400">Level 400</option>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Payment Type </label>
                                            <select name="pay">
                                                <option value="1">Cash </option>
                                                <option value="2">Bank</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Date picker (dd-mm)</label>
                                            <input name="date" type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label>Ref. No# </label>
                                            <input name="ref" type="text" class="span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label>Description </label>
                                            <input name="description" type="text" class="span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label >Discount </label>
                                            <div >
                                                <div class="input-append">
                                                    <input name="discount" type="text" placeholder="0.00" class="span11">
                                                    <span class="add-on">%</span> </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label >Paid Amount </label>
                                            <div >
                                                <div class="input-append">
                                                    <input name="amount" type="text" placeholder="0.000" class="span11"  id="required" required>
                                                    <span class="add-on">GHc</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="student-id" value="<?php echo $student_id;?>">
                                        <input type="hidden" name="category-id" value="<?php echo $student_category;?>">
                                        <input type="hidden" name="transaction" value="fees.payment">
                                        <input type="hidden" name="student-entry-type" value="1">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <p> waffle to pad out the comment. Usually, </p>
                                <form class="form-horizontal">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Student Name </label>
                                            <input name="student" type="text" disabled value="<?php echo $name;?>" class="span11" />
                                        </div>

                                        <div class="control-group">
                                            <label>School </label>
                                            <select name="school">
                                                <?php school_list($conn);?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Session </label>
                                            <select name="session">
                                                <option value=""></option>
                                                <?php year_list($conn);?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Semester </label>
                                            <select name="semester">
                                                <option value="1">1st Semester </option>
                                                <option value="2">2nd Semester </option>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Level </label>
                                            <select name="level">
                                                <option value="100">Level 100 </option>
                                                <option value="200">Level 200</option>
                                                <option value="300">Level 300</option>
                                                <option value="400">Level 400</option>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label>Payment Type </label>
                                            <select name="pay">
                                                <option value="1">Cash </option>
                                                <option value="2">Bank</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="span6">
                                        <div class="control-group">
                                            <label>Date picker (dd-mm)</label>
                                            <input name="date" type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label>Ref. No# </label>
                                            <input name="ref" type="text" class="span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label>Description </label>
                                            <input name="description" type="text" class="span11" id="required" required />
                                        </div>
                                        <div class="control-group">
                                            <label >Discount </label>
                                            <div >
                                                <div class="input-append">
                                                    <input name="discount" type="text" placeholder="0.00" class="span11">
                                                    <span class="add-on">%</span> </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label >Paid Amount </label>
                                            <div >
                                                <div class="input-append">
                                                    <input name="amount" type="text" placeholder="0.000" class="span11"  id="required" required>
                                                    <span class="add-on">GHc</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="student-id" value="<?php echo $student_id;?>">
                                        <input type="hidden" name="category-id" value="<?php echo $student_category;?>">
                                        <input type="hidden" name="transaction" value="fees.payment">
                                        <input type="hidden" name="student-entry-type" value="2">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="local-student" class="tab-pane fade">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Fees Payment Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Tran Date</th>
                                <th>Date</th>
                                <th>Student Name</th>
                                <th>Admission No#</th>
                                <th>Session</th>
                                <th>level</th>
                                <th>Ref. No#</th>
                                <th>Trans.Type#</th>
                                <th>Paid</th>
                                <th><i class="icon-resize-vertical"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php fees_details($conn,$student_id); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="summary" class="tab-pane fade">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Fees Payment Details</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Admission No#</th>
                                <th>Session</th>
                                <th>Level</th>
                                <th>Fees</th>
                                <th>Payment</th>
                                <th>Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php summary_details($conn,$student_id); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
