<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 5:04 PM
 */

function bankbook($conn){
    $cash="SELECT * FROM get_bankbook";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['bankDr']."</td>
            <td>".$c['bankCr']."</td>
        </tr>
    ";
    }
}
function summary_bnkbook($conn){
    $cash="SELECT * FROM get_sum_bankbook";
    $cash=$conn->query($cash);
    $c=$cash->fetch_assoc();
    $debit=$c['Debit'];
    $credit=$c['Credit'];
    $bal=$debit-$credit;

    echo "
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
            <td>".$bal."</td>
        </tr>
    ";
}


?>
<div class="row-fluid">
    <div class="span6">

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
                        <?php summary_bnkbook($conn)?>
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
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php bankbook($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
