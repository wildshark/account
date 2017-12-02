<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09-Jul-17
 * Time: 10:47 PM
 */
function salary_control_data_sheet($conn){

    $sql = "SELECT * FROM get_salary_control";
    $salary_cost = $conn->query($sql);
    while ($sc = $salary_cost->fetch_assoc()) {
        if($sc['semesterID'] = 1){
            $semester = "1st Semester";
        } else{
            $semester = "2nd Semester";
        }

        echo "
            <tr class='odd gradeX'>
                <td>" . $sc['GL_date'] . "</td>
                <td>" . $sc['description'] . "</td>
                <td>" . $sc['refNo'] . "</td>
                <td>" . $sc['yearID'] . "</td>
                <td>" . $semester . "</td>
                <td class='center'>" . $sc['qouteDr'] . "</td>
                <td class='center'>" . $sc['qouteCr'] . "</td>              
                <td><a href='transaction.php?transaction=delete&c=staff.loan&data=".$sc['GL_ID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>       
            </tr>      
        ";
    }
}
function summary_ledger($conn){

    $data="SELECT * FROM get_summary_salary_control";
    $data=$conn->query($data);
    $r=$data->fetch_assoc();
    if ($r['Dr'] == 0 || empty($r['Dr'])){
        $debit ="0.00";
    }else{
        $debit = $r['Dr'];
    }

    if ($r['Cr'] == 0 || empty($r['Cr'])){
        $credit ="0.00";
    }else{
        $credit = $r['Cr'];
    }

    if ($r['balance'] == 0 || empty($r['balance'])){
        $balance ="0.00";
    }else{
        $balance= $r['balance'];
    }


    echo "
        <tr>
            <td>Date</td>
            <td>".date('d-m-Y')."</td>
        </tr>
        <tr>
            <td>Debit</td>
            <td>".$debit."</td>
        </tr>
        <tr>
            <td>Credit</td>
            <td>".$credit."</td>
        </tr>
        <tr>
            <td>Balance</td>
            <td>".$balance."</td>
        </tr>
    ";

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
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php summary_ledger($conn)?>
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
                        <th>Details</th>
                        <th>Ref. No#</th>
                        <th>Session</th>
                        <th>Semester</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php salary_control_data_sheet($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
