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
    while ($r=$data->fetch_assoc()) {

        $schoolID = $r['schoolID'];
        $studentID = $r['studentID'];

        $fees_balance="SELECT * FROM get_student_fees_balance WHERE studentID='$studentID'";
        $fees_balance=$conn->query($fees_balance);
        $bal=$fees_balance->fetch_assoc();
        if (empty($bal['balance']) || $bal['balance'] == 0 || is_null($bal['balance'])){
            $_SESSION['balance']="0.00";
            $bal="0.00";
        }else{
            $_SESSION['balance'] = $bal['balance'];
            $bal=$bal['balance'];
        }

        if ($r['categoryID'] == 1) {
            $cate = "Local Student";
        } elseif ($r['categoryID'] == 2) {
            $cate = "Foreign Student";
        } else {
            $cate = "Unknown ***";
        }

        if ($r['statusID'] == 1) {
            $status = "New Student";

            $fees_bill = "SELECT * FROM get_fees_list_for_new_student WHERE schoolID='$schoolID'";
            $fees_bill = $conn->query($fees_bill);
            $bill = $fees_bill->fetch_assoc();

            $tuition = $bill['tuition'];
            $other_tuition = $bill['other_fees'];

            $_SESSION['hostel'] = $bill['hostel'];
            $_SESSION['tuition'] = $tuition;
            $_SESSION['other_tuition'] = $other_tuition;

            $_SESSION['total_fees'] = $tuition + $other_tuition +  $_SESSION['balance'] ;

        } elseif ($r['statusID'] == 2) {
            $status = "Continuing Student";

            $fees_bill = "SELECT * FROM get_fees_list_continuing_student WHERE schoolID='$schoolID'";
            $fees_bill = $conn->query($fees_bill);
            $bill = $fees_bill->fetch_assoc();

            $tuition = $bill['tuition'];
            $other_tuition = $bill['other_fees'];

            $_SESSION['hostel'] = $bill['hostel'];
            $_SESSION['tuition'] = $tuition;
            $_SESSION['other_tuition'] = $other_tuition;
            $_SESSION['total_fees'] = $tuition + $other_tuition +  $_SESSION['balance'];



        } else {
            $status = "unknown ***";
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
                    <a href='#bill{$r['studentID']}' data-toggle='modal' class='btn btn-warning'>Bill Student</a>
                        <div id='bill{$r['studentID']}' class='modal hide'>
                          <div class='modal-header'>
                            <button data-dismiss='modal' class='close' type='button'>×</button>
                            <h3>Creat school fees bill for name : {$r['studentName']}</h3>
                          </div>
                          <form class='form-horizontal' method='get' action='account##.php' name='number_validate' id='number_validate'>
                          <div class='modal-body'>
                          <div class='widget-box'>
                            <div class='widget-title'>
                                <ul class='nav nav-tabs'>
                                    <li class='active'><a data-toggle='tab' href='#tab1{$r['studentID']}'>Student {$r['admissionNo']}</a></li>
                                    <li><a data-toggle='tab' href='#tab2{$r['studentID']}'>Fees</a></li>
                                    <li><a data-toggle='tab' href='#tab3{$r['studentID']}'>Hostel</a></li>
                                </ul>
                            </div>
                            <div>
                                <input type='hidden' name='transaction' required='required' value='fees.bill'>
                                <input type='hidden' name='id' required='required' value='{$r['studentID']}'>
                                <input type='hidden' name='category' required='required' value='{$r['categoryID']}'>
                                <input type='hidden' name='course' required='required' value='{$r['courseID']}'>
                                <input type='hidden' name='school' required='required' value='{$r['schoolID']}'>
                            </div>
                            
                            <div class='widget-content tab-content'>
                                <div id='tab1{$r['studentID']}' class='tab-pane active'>
                          
                  					<div class='control-group'>
                                        <label class='control-label'>Session</label>
                                        <div class='controls'>
                                            <input type='number'  name='session' required='required' id='required' placeholder='2017'>
                                        </div>
                                    </div> 
                                    
                                    <div class='control-group'>
                                        <label class='control-label'>Semester</label>
                                        <div class='controls'>
                                             <label>
                                                    <input type='radio' name='semester' value='1' />
                                                    1st Semester</label>
                                             <label>
                                                    <input type='radio' name='semester' value='2' />
                                                    2nd Semester</label>                                           
                                        </div>
                                    </div>
                                    
                                    <div class='control-group'>
                                        <label class='control-label'>Student level</label>
                                        <div class='controls'>
                                             <label>
                                                    <input type='radio' name='student-level' value='100' />
                                                    100</label>
                                             <label>
                                                    <input type='radio' name='student-level' value='200'/>
                                                    200</label>
                                             <label>
                                                    <input type='radio' name='student-level' value='300' />
                                                    300</label>
                                             <label>
                                                    <input type='radio' name='student-level' value='400' />
                                                    400</label>       
                                        </div>
                                    </div> 
                                </div>
                                <div id='tab2{$r['studentID']}' class='tab-pane'>
                                    <div class='control-group'>
                                	     <label class='control-label'>Fees Balance</label>
                                         <div class='controls'>
                                            <input type='text'  name='fees-balance' readonly value='{$_SESSION['balance'] }' id='required'>
                                         </div>
                                	</div>
                                    <div class='control-group'>
                                	     <label class='control-label'>Tuition Fees</label>
                                         <div class='controls'>
                                            <input type='text'  name='tuition-fees' readonly value='{$_SESSION['tuition']}' id='required'>
                                         </div>
                                	</div>
                                    <div class='control-group'>
                                	     <label class='control-label'>Total Fees</label>
                                         <div class='controls'>
                                            <input type='text'  name='total-fees' readonly value='{$_SESSION['total_fees']}' id='required'>
                                         </div>
                                	</div>
                                	<div class='control-group'>
                                	     <label class='control-label'>Discount (%)</label>
                                         <div class='controls'>
                                            <input type='number'  name='discount' required='required' id='required' placeholder='100'>
                                         </div>
                                	</div>
                                	
                                </div>
                                <div id='tab3{$r['studentID']}' class='tab-pane'>
                                    <div class='control-group'>
                                	     <label class='control-label'>Hostel Fees</label>
                                         <div class='controls'>
                                            <input type='text'  name='hostel-fees' readonly value='{$_SESSION['hostel']}' id='required'>
                                         </div>
                                	</div>
                                	<div class='control-group'>
                                	     <label class='control-label'>Hostel Fees Payable</label>
                                         <div class='controls'>
                                            <input type='number'  name='hostel-fees-paid' required='required' placeholder='0.00' id='required'>
                                         </div>
                                	</div>
                                	<div class='control-group'>
                                        <label class='control-label'>Hostel Bill Status</label>
                                        <div class='controls'>
                                             <label>
                                                    <input type='radio' name='hostel-bill-status' value='include' />
                                                    Include Hostel Fee to Bill</label>
                                             <label>
                                                    <input type='radio' name='hostel-bill-status' value='exclude' />
                                                    Exclude Hostel Fee from Bill</label>     
                                        </div>
                                    </div>
                 
                                </div>
                            </div>                            
                        </div>
                            
                          <div class='modal-footer'> 
                            <button name='submit' type='submit' value='submit' class='btn btn-primary'>Confirm</BUTTON> 
                            <a data-dismiss='modal' class='btn' href='#'>Cancel</a>
                          </div>
                        </div>
                    </form> 
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