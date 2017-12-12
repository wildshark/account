<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 12-Dec-17
 * Time: 11:20 AM
 */


function data_fees_ledger($conn){
    $data="SELECT * FROM get_student_list";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td></td>
               <td>".$r['studentName']."</td>
               <td>".$r['admissionNo']."</td>
               <td>".$r['categoryID']."</td>
               <td>".$r['course']."</td>
               <td>".$r=$r['school']."</td>
               <td><a href='account.php?user=fees.payment.details&id=".$r['studentID']."&error=0&alert=1' class='btn btn-mini btn-primary'>view</a> </td>
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
                        <th>Student Name</th>
                        <th>Admission</th>
                        <th>Fees</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php data_fees_ledger($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>