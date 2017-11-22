<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21-Nov-17
 * Time: 11:02 AM
 */

?>
<div class="row-fluid">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Selected Year</td>
                            <td><?php echo $_GET['year'];?></td>
                        </tr>
                        <tr>
                            <td>Start Date</td>
                            <td><?php echo $_GET['start-date'];?></td>
                        </tr>
                        <tr>
                            <td>End Date</td>
                            <td><?php echo $_GET['end-date']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php profit_loss_calculation($conn,$start,$end)?>
</div>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Revenue</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php get_fees_income($conn,$start,$end)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Expenses</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php get_profit_loss_expenditure($conn, $start, $end)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
