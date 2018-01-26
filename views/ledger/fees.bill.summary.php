<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 03-Jan-18
 * Time: 8:16 AM
 */

function data_fees_bill_summary($conn){
    $id=$_GET['id'];
    $data="SELECT * FROM get_fees_bill_summary WHERE studentID='$id'";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){

        echo "
            <tr>
               <td>".$r['refNo']."</td>
               <td>".$r['payDate']."</td>
               <td>".$r['studentName']."</td>
               <td>".$r['admissionNo']."</td>
               <td>".$r['prefix']."</td>
               <td>".$r['main_fees']."</td>
               <td>".$r['tutor_materials']."</td>
               <td>".$r['hostel_fees']."</td>
               <td>".$r['discount']."%</td>                             
               <td>".$r['amount']."</td>                           
               <td><a href='account.php?user=fees.payment.details&id=".$r['studentID']."&student={$r['studentName']}&error=0&alert=1' class='btn btn-mini btn-primary'>View ledger</a>
               <a href='account.php?user=fees.bill.details&id=".$r['studentID']."&error=0&alert=1' class='btn btn-mini btn-primary'>View Bills</a>
                <a href='account.php?delete=fees-ledger&id=".$r['studentID']."&semester=".$r['semesterID']."&year=".$r['sch_session']."&error=0&alert=1' class='btn btn-mini btn-primary'>Delete</a></td>
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
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th><i class="icon-resize-vertical"></i></th>
                        <th>Date</th>
                        <th>Student Name</th>
                        <th>Admission</th>
                        <th>School</th>
                        <th>Tuition Fees</th>
                        <th>Other Fees</th>
                        <th>Hostel</th>
                        <th>Discount</th>
                        <th>Bill</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php data_fees_bill_summary($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

