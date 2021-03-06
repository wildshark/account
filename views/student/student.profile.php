<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08-Aug-17
 * Time: 4:12 AM
 */

function student_data($conn){
    $data="SELECT * FROM get_student_profile";
    $data=$conn->query($data);
   while ( $d=$data->fetch_assoc()){
       $studentID=$d['studentID'];
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
            <td>".$school."</td>
            <td>
                <a href='account.php?delete=student-data&id={$studentID}' class='btn btn-mini btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span>Delete</a>
                <a href='account.php?edit=student-data&id={$studentID}&error=0&alert=1&c={$_SESSION['roleID']}' class='btn btn-mini btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span>Edit</a>
            </td>
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
                <form class="form-horizontal" method="GET" action="account.php" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <input type="hidden" name="transaction" value="student.data">
                    <div class="control-group">
                        <label class="control-label">Admission Date</label>
                        <div class="controls">
                            <input name="date" type="date" data-date="<?php echo date('dd-mm-Y');?>" data-date-format="dd-mm-yyyy" class="span11" id="date">
                            <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Semester</label>
                        <div class="controls">
                            <select name="semester" required>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admission Year</label>
                        <div class="controls">
                            <select name="admission-year" required>
                                <?php year_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admission Number</label>
                        <div class="controls">
                            <input type="text" name="admission-number" id="required" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Student Name</label>
                        <div class="controls">
                            <input type="text" name="student-name" id="required" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Student category</label>
                        <div class="controls">
                            <select name="student-category" required>
                                <option value="1">Local Student</option>
                                <option value="2">International Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Programme</label>
                        <div class="controls">
                            <select name="course" required>
                                <?php course_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input type="text" name="mobile" id="mobile" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit"  name="submit" value="validate" class="btn btn-success pull-right">
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
                        <th>School</th>
                        <th></th>
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
