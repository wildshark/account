<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01-Jul-17
 * Time: 10:17 AM
 */


function ledger($conn){
    $revenue="SELECT * FROM fees_details_summary";
    $revenue=$conn->query($revenue);
    while ($r=$revenue->fetch_assoc()){

        echo "
        <tr class='gradeX'>          
            <td>".$r['revenue']."</td>
            <td>".$r['total']."</td>
            <td><a href='account.php?user=fees.income.details&data=".$r['revenueID']."&sort=".$r['revenue']."&error=0&alert=1' class='btn btn-mini btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span>View Details</a></a></tr>
    ";
    }
}

?>

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
                            <th>Details</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ledger($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
