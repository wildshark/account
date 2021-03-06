<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01-Jul-17
 * Time: 10:17 AM
 */
$student=$_GET['id'];

function calculation_summary($conn,$student){
    $data="SELECT * FROM get_fees_ledger_book WHEre studentID ='$student'";
    $data=$conn->query($data);
    $cal=$data->fetch_assoc();
    $balance = $cal['amount'] - $cal['paid'];
    echo"
        <tr>
        <td>Total Fees</td>
        <td>{$cal['amount']}</td>
        </tr>
        <tr>
        <td>Total Payment</td>
        <td>{$cal['paid']}</td>
        </tr>
        <tr>
        <td>Balance</td>
        <td>{$balance}</td>
        </tr>
    ";
}

function student_data($conn,$student){
    $data="SELECT * FROM get_student_list WHERE studentID='$student'";
    $data=$conn->query($data);
    $student=$data->fetch_assoc();

    echo "
        <tr>
            <td>Student</td>
            <td>{$student['studentName']}</td>
        </tr>
        <tr>
            <td>Admission No#</td>
            <td>{$student['admissionNo']}</td>
        </tr>
        <tr>
            <td>School </td>
            <td>{$student['prefix']}</td>
        </tr>
    ";

}

function ledger($conn,$student){
    $cash="SELECT * FROM get_fees_payment_history WHERE studentID='$student'";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){

        if ($c['semesterID'] == 1){
            $semester= "1st Semester";
        }elseif ($c['semesterID'] == 2){
            $semester= "2nd Semester";
        }

        if ($c['payTypeID']== 1){
            $pay_type="Cash";
        }elseif ($c['payTypeID']== 2){
            $pay_type="Bank";
        }elseif ($c['payTypeID']==3){
            $pay_type="Bill";
        }else{
            $pay_type="Unknown";
        }
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['payDate']."</td>
            <td>".$c['sch_session']."</td>
            <td>".$semester."</td>
            <td>".$c['stud_level']."</td>
            <td>".$c['refNo']."</td>
            <td>".$pay_type."</td>
            <td>".$c['fees_amount']."</td>
            <td>".$c['paid_amount']."</td>
        </tr>
    ";
    }
}

?>
<div class="row-fluid">
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
                        <th>Browser</th>
                        <th>Visits</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php student_data($conn,$student);?>
                    </tbody>
                </table>
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
                        <th>Browser</th>
                        <th>Visits</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php calculation_summary($conn,$student);?>
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
                        <th>Session</th>
                        <th>Semester</th>
                        <th>Level</th>
                        <th>Ref. No#</th>
                        <th>Pay Type</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php ledger($conn,$student)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
