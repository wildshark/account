<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01-Jul-17
 * Time: 10:17 AM
 */
$expID=$_GET['data'];

function ledger_summary($conn,$expID){
    $expense="SELECT GL_date, Sum(qouteDr) as total, tranCatID FROM get_expenditure_book WHERE tranCatID ='$expID'";
    $expense=$conn->query($expense);
    while ($r=$expense->fetch_assoc()){

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

function ledger($conn,$expID){
    $revenue="SELECT * FROM general_legder WHERE general_legder.tranTypeID = 3 And tranCatID='$expID'";
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
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['yearID']."</td>
            <td>".$semester."</td>
            <td>".$c['description']." </td>  
            <td>".$c['qouteDr']."</td>
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
                        <?php ledger_summary($conn,$expID)?>
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
                        <?php ledger($conn,$expID)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
