<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:24 PM
 */

function data_sheet_ious($conn){
    $data="SELECT * FROM ious";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td></td>
               <td>".$r['ledger']."</td>
               <td>".$r['cost']."</td>
               <td>".$r['paid']."</td>
               <td>".$r['bal']."</td>
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
                <h5>Static table with checkboxes</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped with-check">
                    <thead>
                    <tr>
                        <th><i class="icon-resize-vertical"></i></th>
                        <th>Ledger</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php data_sheet_ious($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

