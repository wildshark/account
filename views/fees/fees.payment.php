<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:16 PM
 */

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
if (empty($_SESSION['studentID'])){
    $student='Null';
}else{
    $student=$_SESSION['studentID'];
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

    $student_data=$conn->query("SELECT * FROM get_student_profile WHERE studentID='$student'");
    $d=$student_data->fetch_assoc();
    $course=$d['courseID'];
    $yearID=$d['admissionYr'];

    $student_school=$conn->query("SELECT * FROM get_course_list WHERE courseID='$course'");
    $s=$student_school->fetch_assoc();
    $course=$s['course'];
    $school=$s['prefix'];

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
                        <label class="control-label">Admission Number </label>
                        <div class="controls">
                            <select name="q">
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
                    <li><a data-toggle="tab" href="#tab2">Payment Slip</a></li>
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
                    <p> waffle to pad out the comment. Usually, </p>
                    <form class="form-horizontal">
                        <div class="span6">
                            <div class="control-group">
                                <label>Student Name </label>
                                <input name="student" type="text" disabled value="<?php echo $name;?>" class="span11" />
                            </div>

                            <div class="control-group">
                                <label>Course </label>
                                <select name="course">
                                    <?php course_list($conn);?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label>Payment Type </label>
                                <select name="semester">
                                    <option value="1">1st Semester </option>
                                    <option value="2">2nd Semester </option>
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
                                <input name="date" type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y");?>" class="datepicker span11">
                            </div>
                            <div class="control-group">
                                <label>Ref. No# </label>
                                <input name="ref" type="text" class="span11" />
                            </div>
                            <div class="control-group">
                                <label>Description </label>
                                <input name="description" type="text" class="span11" />
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
                            <input type="hidden" name="ticket" value="<?php echo $student;?>">
                            <input type="hidden" name="transaction" value="fees.payment">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
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
                <h5>Fees Payment Details</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Details</th>
                        <th>level</th>
                        <th>Session</th>
                        <th>Ref. No#</th>
                        <th>Trans.Type#</th>
                        <th>Paid</th>
                        <th><i class="icon-resize-vertical"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php fees_details($conn,$student)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>