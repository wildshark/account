<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02-Aug-17
 * Time: 10:59 PM
 */

function salary_control($conn){
    $cash="SELECT * FROM get_salary_calculation";
    $cash=$conn->query($cash);
    while ($c=$cash->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td class='center'>".$c['payDate']."</td>
            <td>".$c['TaxableSalary']."</td>
            <td>".$c['TotalPaye']."</td>
            <td>".$c['NetSalary']."</td>
        </tr>
    ";
    }
}
function summary_book($conn){
    $cash="SELECT * FROM get_sum_salary_control";
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
                        <th>Taxable Salary</th>
                        <th>Total Paye</th>
                        <th>Net Salary</th>
                        <th>Payy Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php salary_control($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
