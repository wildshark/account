<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:41 PM
 */

function data_sheet_ious($conn){
    $data="SELECT * FROM get_advance_payment";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){
        $_SESSION['ledger']=$r['ledger']; //use at view.ledger as title line 130 and 133 dashboard
        echo "
            <tr>
               <td></td>
               <td>".$r['ledger']."</td>
               <td>".$r['cost']."</td>
               <td>".$r['paid']."</td>
               <td>".$r['bal']."</td>
               <td>
                   <a href='account.php?user=view.ledger&data=".$r['tranCatID']."&book=".$r['ledger']."' class='btn btn-mini btn-primary left'>View Details</a>
                   <a href='account.php?user=pay.voucher' class='btn btn-mini btn-primary left'>Make Payment</a>
               </td>
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
                        <th>Debt</th>
                        <th>Credit</th>
                        <th>Advance</th>
                        <th></th>
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

