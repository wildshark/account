<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 16-Dec-17
 * Time: 10:01 AM
 */

?>
<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new-student-payment-slip">New Student Payment Slip</a></li>
            <li><a data-toggle="tab" href="#continuing-payment-slip">Continuing Payment Slip</a></li>
        </ul>
        <div class="tab-content">
            <div id="new-student-payment-slip" class="tab-pane fade in active">
                <form class="form-horizontal">
                    <div class="span4">
                        <div class="control-group">
                            <label>Student Name </label>
                            <select name="student-id">
                                <?php student_list($conn);?>
                            </select>
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
                                    <input type="checkbox" name="technology" />
                                    Technology</label>
                                <label>
                                    <input type="checkbox" name="hostel" />
                                    Hostel</label>
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
                        <input type="hidden" name="student-id" value="<?php echo $student_id;?>">
                        <input type="hidden" name="category-id" value="<?php echo $student_category;?>">
                        <input type="hidden" name="transaction" value="fees.payment">
                        <input type="hidden" name="student-entry-type" value="2">
                        <button type="submit" class="btn btn-success pull-right">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
