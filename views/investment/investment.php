<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02-Aug-17
 * Time: 11:12 PM
 */

function investment($conn){
    $cash="SELECT * FROM fees_payment";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['GL_date']."</td>
            <td>".$c['description']."</td>
            <td>".$c['refNo']."</td>
            <td>".$c['cashDr']."</td>
            <td>".$c['cashCr']."</td>
        </tr>
    ";
    }
}

function summary_book($conn){
    $cash="SELECT * FROM get_sum_cashbook";
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
                    <?php summary_cashbook($conn)?>
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
                        <th>Description</th>
                        <th>Ref. No#</th>
                        <th>Payment</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php cashbook($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
