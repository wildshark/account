<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01-Jul-17
 * Time: 10:17 AM
 */
$student=$_GET['id'];


function ledger($conn,$student){
    $cash="SELECT * FROM get_fees_payment_history WHERE studentID='$student'";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){

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
            <td>".$c['semesterID']."</td>
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
                    <tr>
                        <td>Student</td>
                        <td><?php echo $_SESSION['student_name'];?></td>
                    </tr>
                    <tr>
                        <td>Admission No#</td>
                        <td><?php echo $_SESSION['admissionNo'];?></td>
                    </tr>
                    <tr>
                        <td>School </td>
                        <td><?php echo $_SESSION['amount']-$_SESSION['paid'] ?></td>
                    </tr>
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
                    <tr>
                        <td>Total Fees</td>
                        <td><?php echo $_SESSION['amount'];?></td>
                    </tr>
                    <tr>
                        <td>Total Payment</td>
                        <td><?php echo $_SESSION['paid'];?></td>
                    </tr>
                    <tr>
                        <td>Balance</td>
                        <td><?php echo $_SESSION['amount']-$_SESSION['paid'] ?></td>
                    </tr>
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
