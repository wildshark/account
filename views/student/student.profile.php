<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08-Aug-17
 * Time: 4:12 AM
 */

function student_data($conn){
    $data="SELECT * FROM student_profile";
    $data=$conn->query($data);
   while ( $d=$data->fetch_assoc()){

       $date = $d['admissionDate'];
       $date= date('d-m-Y', strtotime($date));
       $student = $d['studentName'];
       $admissionNo = $d['admissionNo'];
       //$mobile = $d['mobile'];
       $admissionYr = $d['admissionYr'];
       $course = $d['courseID'];

       $data_course="SELECT * FROM get_course_list WHERE courseID = '$course' ";
       $data_course=$conn->query($data_course);
       $c=$data_course->fetch_assoc();

       $course=$c['course'];
       $school = $c['prefix'];

       echo "
        <tr class='gradeX'>
            <td>".$date."</td>
            <td>".$student."</td>
            <td>".$admissionNo."</td>
            <td>".$admissionYr."</td>
            <td>".$course."</td>
            <td>".$school."</td>
        </tr>
    ";
   }
}

?>

<div class="row-fluid">
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title">
				<span class="icon">
					<i class="icon-info-sign"></i>
				</span>
                <h5>Data validation</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="transaction.php?transaction=student.data" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                        <label class="control-label">Date picker (dd-mm)</label>
                        <div class="controls">
                            <input name="date" type="text" data-date="01-02-2013" data-date-format="dd-mm-yyyy" class="datepicker span11">
                            <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admission Year</label>
                        <div class="controls">
                            <select name="admission-year">
                                <?php year_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admission Number</label>
                        <div class="controls">
                            <input type="text" name="admission-number" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Student Name</label>
                        <div class="controls">
                            <input type="text" name="student-name" id="required">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Student category</label>
                        <div class="controls">
                            <select name="student-category">
                                <option value="1">Local Student</option>
                                <option value="2">International Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Course</label>
                        <div class="controls">
                            <select name="course">
                                <?php course_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input type="text" name="mobile" id="mobile">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit"  name="submit" value="validate" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span7">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="icon-th"></i></span>
                <h5>Data table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Student</th>
                        <th>Reg. No</th>
                        <th>Year</th>
                        <th>Course</th>
                        <th>School</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php student_data($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
