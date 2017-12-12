<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24-Aug-17
 * Time: 10:34 PM
 */

function course_data($conn){
    $data="SELECT * FROM get_course_list";
    $data=$conn->query($data);
    while ( $d=$data->fetch_assoc()){
        $id=$d['courseID'];
        $course=$d['course'];
        $school = $d['prefix'];
        $url="account.php?transaction=delete&c=course&data=".$id;
        echo "
        <tr class='gradeX'>
            <td>".$course."</td>
            <td>".$school."</td>
            <td><a href='".$url."' class='btn btn-mini btn-xs btn-danger'><span class='glyphicon glyphicon-trash'></span>Delete</a></a></td>
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
                    <input type="hidden" name="transaction" value="course.data">
                    <div class="control-group">
                        <label class="control-label">School</label>
                        <div class="controls">
                            <select name="school" required>
                                <?php school_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Programme</label>
                        <div class="controls">
                            <input type="text" name="course" id="required" required>
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
                        <th>Programme</th>
                        <th>School</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php course_data($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
'