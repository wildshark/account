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
                    <div class='btn-group'>
					    <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'>Action <span class='caret'></span></button>
		                    <ul class='dropdown-menu'>
							    <li><a href='account.php?transaction=fees.bill&id=".$r['studentID']."&category={$r['categoryID']}&status={$r['statusID']}&course={$r['courseID']}&school={$r['schoolID']}&level=100&error=0&alert=1'>Level 100</a></li>
							    <li><a href='account.php?transaction=fees.bill&id=".$r['studentID']."&category={$r['categoryID']}&status={$r['statusID']}&course={$r['courseID']}&school={$r['schoolID']}&level=200&error=0&alert=1'>Level 200</a></li>
							    <li><a href='account.php?transaction=fees.bill&id=".$r['studentID']."&category={$r['categoryID']}&status={$r['statusID']}&course={$r['courseID']}&school={$r['schoolID']}&level=300&error=0&alert=1'>Level 300</a></li>
							    <li class='divider'></li>
							    <li><a href='account.php?transaction=fees.bill&id=".$r['studentID']."&category={$r['categoryID']}&status={$r['statusID']}&course={$r['courseID']}&school={$r['schoolID']}&level=400&error=0&alert=1'>Level 400</a></li>
							</ul>
					</div>
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