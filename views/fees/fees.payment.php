<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jan-18
 * Time: 3:55 PM
 */

$id = $_GET['id'];
$name = ucwords(strtolower($_GET['name']));
$admission = $_GET['admission'];
$semesterID= $_GET['semester'];
$year = $_GET['year'];
$school = $_GET['school'];
$main_fees = $_GET['main'];
$other_fees = $_GET['other'];
$hostel = $_GET['hostel'];
$discount = $_GET['discount'];
$bill = $_GET['bill'];
$balance = $_GET['balance'];




function data_sheet ($conn,$id){
    $sql= "Select * from get_fees_payment_history WHERE studentID='$id'";
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){

        if ($r['semesterID'] == 1){
            $semester = "1st Semester";
        }else if ($r['semesterID'] == 2){
            $semester = "2nd Semester";
        }

        echo "
            <tr class='gradeC'>
                <td>{$r['payDate']}</td>
                <td>{$r['sch_session']}</td>
                <td>{$semester}</td>
                <td>{$r['paid_amount']}</td>
            </tr>
        ";
    }
}

?>

<div class="row-fluid">

    <div class="widget-box">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Bill Summary</a></li>
                <li><a data-toggle="tab" href="#tab2">Payment History</a></li>
                <li><a data-toggle="tab" href="#tab3">Payment Terminal</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Student Name :</label>
                                    <div class="controls">
                                        <input type="text" name="student-name" value="<?php echo $name;?>" readonly class="span11" placeholder="First name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Admission Number :</label>
                                    <div class="controls">
                                        <input type="text" name="admission-no" value="<?php echo $admission;?>" readonly class="span11" placeholder="Last name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Session :</label>
                                    <div class="controls">
                                        <input type="text" name="year" value="<?php echo $year;?>" readonly  class="span11" placeholder="Enter Password"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">School Name :</label>
                                    <div class="controls">
                                        <input type="text" name="school-name" value="<?php echo $school;?>"  readonly class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" disabled class="btn btn-success pull-right">Refresh</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Previous Balance :</label>
                                    <div class="controls">
                                        <input type="text" name="previous-balance" readonly value="<?php echo $balance;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tuition Fees :</label>
                                    <div class="controls">
                                        <input type="text" name="tuition-fees" readonly value="<?php echo $main_fees;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Other Added Fees :</label>
                                    <div class="controls">
                                        <input type="text" name="other-added-fees" readonly value="<?php echo $other_fees;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Hostel Fees :</label>
                                    <div class="controls">
                                        <input type="text" name="hostel-fees" readonly value="<?php echo $hostel;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit"  disabled class="btn btn-success pull-right">Refresh</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Discount :</label>
                                    <div class="controls">
                                        <input type="text" name="other-added-fees" readonly value="<?php echo $discount;?>%" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Sub Total :</label>
                                    <div class="controls">
                                        <input type="text" name="hostel-fees" readonly value="<?php echo $bill;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Add Hostel :</label>
                                    <div class="controls">
                                        <input type="text" name="school-name" readonly value="<?php echo number_format($bill + $hostel,'2') ;?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fees Payable :</label>
                                    <div class="controls">
                                        <input type="text" name="school-name" readonly value="<?php echo number_format($bill + $hostel + $balance,'2');?>" class="span11" placeholder="Company name" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" disabled class="btn btn-success pull-right">Refresh</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-pane">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-th"></i></span>
                            <h5>Payment History</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Session</th>
                                    <th>Semester</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php data_sheet ($conn,$id);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div id="tab3" class="tab-pane">
                <div class="span6">
                    <div class="control-group">
                        <label>Session </label>
                        <select name="session">
                            <?php year_list($conn);?>
                        </select>
                    </div>
                    <div class="control-group">
                        <label>Semester </label>
                        <select name="semester">
                            <option value="1">1st Semester </option>
                            <option value="2">2nd Semester </option>
                        </select>
                    </div>
                    <div class="control-group">
                        <label>Level </label>
                        <select name="level">
                            <option value="100">Level 100 </option>
                            <option value="200">Level 200</option>
                            <option value="300">Level 300</option>
                            <option value="400">Level 400</option>
                        </select>
                    </div>
                    <div class="control-group">
                        <label>Payment Type </label>
                        <select name="pay">
                            <option value="1">Cash </option>
                            <option value="2">Bank</option>
                        </select>
                    </div>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <label>Date picker (dd-mm)</label>
                        <input name="date" type="date" data-date="01-02-2013" data-date-format="mm-dd-yyyy" value="<?php echo date("m-d-Y");?>" class="datepicker span11" id="required" required />
                    </div>
                    <div class="control-group">
                        <label>Ref. No# </label>
                        <input name="ref" type="text" class="span11" id="required" required />
                    </div>
                    <div class="control-group">
                        <label>Description </label>
                        <input name="description" type="text" class="span11" id="required" required />
                    </div>
                    <div class="control-group">
                        <label >Discount </label>
                        <div >
                            <div class="input-append">
                                <input name="discount" type="number" placeholder="0.00" class="span11">
                                <span class="add-on">%</span> </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label >Paid Amount </label>
                        <div >
                            <div class="input-append">
                                <input name="amount" type="number" placeholder="0.000" class="span11"  id="required" required>
                                <span class="add-on">GHc</span> </div>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Checkboxes</label>
                        <div class="controls">
                            <label>
                                <input type="checkbox" name="matriculation" />
                                matriculation</label>
                            <label>
                                <input type="checkbox" name="accept-fees" />
                                Accept Fees</label>
                            <label>
                                <input type="checkbox" name="medical-exam" />
                                Medical Exam</label>
                            <label>
                                <input type="checkbox" name="result-fees" />
                                Result Fees</label>
                            <label>
                                <input type="checkbox" name="lab-fees" />
                                Lab Fees</label>
                            <label>
                                <input type="checkbox" name="indexing" />
                                Indexing</label>
                            <label>
                                <input type="checkbox" name="nmc-book" />
                                NMC Book</label>
                            <label>
                                <input type="checkbox" name="clinical-fees" />
                                Clinical Fees</label>
                            <label>
                                <input type="checkbox" name="technology" />
                                Technology</label>
                            <label>
                                <input type="checkbox" name="hostel" />
                                Hostel</label>
                            <label>
                                <input type="checkbox" name="wasce" />
                                WASCE</label>
                            <label>
                                <input type="checkbox" name="src-dues" />
                                SRC Dues</label>
                            <label>
                                <input type="checkbox" name="other-1" />
                                Other 1</label>
                            <label>
                                <input type="checkbox" name="other-2" />
                                Other 2</label>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" name="transaction" value="fees.payment">
                    <input type="hidden" name="student-entry-type" value="1">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
                </form>
            </div>
            <div id="continuing-payment-slip" class="tab-pane fade">
                <form class="form-horizontal">
                    <div class="span4">
                        <div class="control-group">
                            <label>Student Name </label>
                            <input name="student" type="text" disabled value="<?php echo $name;?>" class="span11" />
                        </div>
                        <div class="control-group">
                            <label>School </label>
                            <select name="school">
                                <?php school_list($conn);?>
                            </select>
                        </div>
                        <div class="control-group">
                            <label>Session </label>
                            <select name="session">
                                <?php year_list($conn);?>
                            </select>
                        </div>
                <div class="span6">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">

</div>


