<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:41 PM
 */

function data_sheet_general_ledger($conn){
    $data="SELECT * FROM get_general_ledger_summary";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){
        $_SESSION['ledger']=$r['ledger']; //use at view.ledger as title line 130 and 133 dashboard
        echo "
            <tr>
               <td>".$r['ledger']."</td>
               <td>".$r['cost']."</td>
               <td>".$r['paid']."</td>
               <td>".$r['bal']."</td>
               <td>".$r['NoOfID']."</td>
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
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Ledger</th>
                        <th>Debt</th>
                        <th>Credit</th>
                        <th>Balance</th>
                        <th>NoOfTransaction</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php data_sheet_general_ledger($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

