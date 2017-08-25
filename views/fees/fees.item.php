<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23-Aug-17
 * Time: 12:06 PM
 */

//international student
function get_fees_list_international($conn){
    $sql="SELECT * FROM get_fees_list WHERE statusID='2' ";
    $data=$conn->query($sql);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td>".$r['prefix']."</td>
               <td>".$r['tuition']."</td>
               <td>".$r['matriculation']."</td>
               <td>".$r['accept_fees']."</td>
               <td>".$r['medical_examin']."</td>
               <td>".$r['result_fees']."</td>
               <td>".$r['lab_fees']."</td>
               <td>".$r['indexing']."</td>
               <td>".$r['nmc_book']."</td>
               <td>".$r['clinical_fees']."</td>
               <td>".$r['graduation_fees']."</td>
               <td>".number_format($r['total_fees'],2)."</td>
               <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>
        ";
    }
}

//local student
function get_fees_list_local($conn){
    $sql="SELECT * FROM get_fees_list WHERE statusID='1' ";
    $data=$conn->query($sql);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td>".$r['prefix']."</td>
               <td>".$r['tuition']."</td>
               <td>".$r['matriculation']."</td>
               <td>".$r['accept_fees']."</td>
               <td>".$r['medical_examin']."</td>
               <td>".$r['result_fees']."</td>
               <td>".$r['lab_fees']."</td>
               <td>".$r['indexing']."</td>
               <td>".$r['nmc_book']."</td>
               <td>".$r['clinical_fees']."</td>
               <td>".$r['graduation_fees']."</td>
               <td>".number_format($r['total_fees'],2)."</td>
               <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>
        ";
    }
}
?>

<div class="row-fluid">
    <div class="span12">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Fees Costing</a></li>
            <li><a data-toggle="tab" href="#menu1">For Local Student</a></li>
            <li><a data-toggle="tab" href="#menu2">For International Student</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <form class="form-horizontal" method="get" action="transaction.php?transaction=fees.costing">
                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Personal-info</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">School </label>
                                    <div class="controls">
                                        <select name="school">
                                            <?php school_list($conn);?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">School </label>
                                    <div class="controls">
                                        <select name="student-cat">
                                            <option value="1">local Student</option>
                                            <option value="2">International Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tuition Fees </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="tuition-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Matriculation </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="matriculation" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Acceptance Fees </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="acceptance" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Medical Examination </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="medical-examination" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="hidden" name="ticket" value="">
                                    <input type="hidden" name="transaction" value="fees.data">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Form Elements</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Result Verification  </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="result-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">lab Fee</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="lab-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Indexing </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="indexing-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">NMC/Clinical Schedule </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="nmc-clinical" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Clinical Fees</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="clinical-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Graduation Fees </label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <input name="graduation-fees" type="number" required placeholder="0.000" class="span11">
                                            <span class="add-on">GHc</span> </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button name="submit" type="submit" value="Save" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="widget-box">
                    <div class="widget-title">
				<span class="icon">
					<i class="icon-eye-open"></i>
				</span>
                        <h5>Browesr statistics</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>School</th>
                                <th>Tuition</th>
                                <th>Matriculation</th>
                                <th>Acceptance</th>
                                <th>Medical Exam.</th>
                                <th>Result Verif.</th>
                                <th>Demonstration</th>
                                <th>Indexing</th>
                                <th>NMC/Clinical</th>
                                <th>Clinical Fees</th>
                                <th>Graduation Fees</th>
                                <th>Total Fees</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php get_fees_list_local($conn)?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="widget-box">
                    <div class="widget-title">
				<span class="icon">
					<i class="icon-eye-open"></i>
				</span>
                        <h5>Browesr statistics</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>School</th>
                                <th>Tuition</th>
                                <th>Matriculation</th>
                                <th>Acceptance</th>
                                <th>Medical Exam.</th>
                                <th>Result Verif.</th>
                                <th>Demonstration</th>
                                <th>Indexing</th>
                                <th>NMC/Clinical</th>
                                <th>Clinical Fees</th>
                                <th>Graduation Fees</th>
                                <th>Total Fees</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php get_fees_list_international($conn)?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

