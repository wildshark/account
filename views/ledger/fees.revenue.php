<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17-Nov-17
 * Time: 8:47 PM
 */

function revenue_ledger($conn){
    $data="SELECT * FROM get_fees_revenue";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){

        echo "
            <tr>
               <td></td>
               <td>".$r['tranDate']."</td>
               <td>".$r['payDate']."</td>
               <td>".$r['studentName']."</td>
               <td>".$r['admissionNo']."</td>
               <td>".$r['type']."</td>
               <td>".$r['amount']."</td>
            </tr>
        ";
    }
}

?>
<div class="row-fluid">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon">
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            </span>
                <h5>Fees Ledger</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped with-check">
                    <thead>
                    <tr>
                        <th><i class="icon-resize-vertical"></i></th>
                        <th>Transaction</th>
                        <th>Date</th>
                        <th>Student Name</th>
                        <th>Admission Number</th>
                        <th>Payment Type</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php revenue_ledger($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>