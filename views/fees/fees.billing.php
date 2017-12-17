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
                    <a href='#myAlert' data-toggle='modal' class='btn btn-warning'>Alert</a>
                        <div id='myAlert' class='modal hide'>
                          <div class='modal-header'>
                            <button data-dismiss='modal' class='close' type='button'>×</button>
                            <h3>Alert modal</h3>
                          </div>
                          <div class='modal-body'>
                            <form class='form-horizontal' method='get' action='account.php' name='number_validate' id='number_validate'>
                            <p>Lorem ipsum dolor sit amet...</p>
                                <div>
                                            <input type='hidden' name='transaction' required='required' value='fees.bill'>
                                            <input type='hidden' name='id' required='required' value='{$r['studentID']}'>
                                            <input type='hidden' name='category' required='required' value='{$r['categoryID']}'>
                                            <input type='hidden' name='course' required='required' value='{$r['courseID']}'>
                                            <input type='hidden' name='school' required='required' value='{$r['schoolID']}'>
                                </div>
                                <div class='control-group'>
                                            <label class='control-label'>Your Name</label>
                                            <div class='controls'>
                                                <input type='text' readonly name='name' value='{$r['studentName']}' id='required'>
                                            </div>
                                        </div>
                                        <div class='control-group'>
                                            <label class='control-label'>Index Number</label>
                                            <div class='controls'>
                                                <input type='text' readonly name='admission-no' id='required' value='{$r['admissionNo']}'>
                                            </div>
                                        </div> 
                                        <div class='control-group'>
                                            <label class='control-label'>Level</label>
                                            <div class='controls'>
                                                <input type='number' name='level' id='number' required='required' value=''>
                                            </div>
                                        </div>
                                        <div class='control-group'>
                                            <label class='control-label'>Student Type</label>
                                            <div class='controls'>
                                                  <label>
                                                    <input type='radio' name='status-new-student' />
                                                    New Student</label>
                                                  <label>
                                                    <input type='radio' name='status-cont-student' />
                                                    Cont. Student</label>
                                                  <label>
                                                    <input type='radio' name='status-auto' />
                                                    Auto-Check</label>
                                            </div>
                                        </div> 
                                        
                            
                          </div>
                          <div class='modal-footer'> 
                            
                            <button name='submit' type='submit' value='submit' class='btn btn-primary'>Confirm</BUTTON> 
                            <a data-dismiss='modal' class='btn' href='#'>Cancel</a>
                            </form> 
                          </div>
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