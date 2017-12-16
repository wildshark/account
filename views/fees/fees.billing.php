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

        if ($r['categoryID'] == 1){
            $cate ="Foreign Student";
        }else{
            $cate="Local Student";
        }

        if ($r['statusID'] == 1) {
            $status = "New Student";
        }else{
            $status = "Continuing Student";
        }
        echo "
            <tr>
               <td></td>
               <td>".$r['studentName']."</td>
               <td>".$r['admissionNo']."</td>
               <td>".$cate."</td>
               <td>".$status."</td>
               <td>".$r['course']."</td>
               <td>".$r['prefix']."</td>
               <td>
                    <a href='account.php?transaction=fees.bill&id=".$r['studentID']."&category={$r['categoryID']}&status={$r['statusID']}&course={$r['courseID']}&school={$r['schoolID']}error=0&alert=1' class='btn btn-mini btn-primary'>Bill Student</a>
                    <a href='account.php?user=fees.payment.details&id=".$r['studentID']."&error=0&alert=1' class='btn btn-mini btn-primary'>Print</a>                
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
                <h5>Fees Ledger</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th><i class="icon-resize-vertical"></i></th>
                            <th>Student Name</th>
                            <th>Admission</th>
                            <th>Group Type</th>
                            <th>Status</th>
                            <th>Course</th>
                            <th>School</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php data_fees_ledger($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>