<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01-Jul-17
 * Time: 10:17 AM
 */
$revenueID=$_GET['data'];

function ledger_summary($conn,$revenueID){
    $revenue="SELECT fees_journal.revenueID, Sum(fees_journal.amount)as total FROM fees_journal
WHERE fees_journal.revenueID = '$revenueID' GROUP BY fees_journal.revenueID";
    $revenue=$conn->query($revenue);
    while ($r=$revenue->fetch_assoc()){

        echo "
              <tr>
                <td>xxx</td>
                <td>xxx.xxx</td>
              <tr>
                <td>Amount</td>
                <td>".$r['total']."</td>
              </tr>
        ";
    }
}

function ledger($conn,$revenueID){
    $revenue="SELECT * FROM get_fees_revenu_journal WHERE revenueID='$revenueID' ";
    $revenue=$conn->query($revenue);
    while ($c=$revenue->fetch_assoc()){

        if ($c['semesterID']== 1){
            $semester="1st Semester";
        }elseif ($c['semesterID']== 2){
            $semester="2nd Semester";
        }else{
            $semester="No Semester";
        }

        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['jDate']."</td>
            <td>".$c['yearID']."</td>
            <td>".$semester."</td>
            <td>".$c['studentName']." index No ".$c['admissionNo']." paid for ".$c['revenue']." </td>  
            <td>".$c['amount']."</td>
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
                        <?php ledger_summary($conn,$revenueID)?>
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
                        <th>Details</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php ledger($conn,$revenueID)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
