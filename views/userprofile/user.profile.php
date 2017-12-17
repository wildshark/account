<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17-Dec-17
 * Time: 6:46 AM
 */


$staff_name = $_SESSION['login_full_name'];
$mobile = $_SESSION['login_mobile'];
$email = $_SESSION['login_email'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$role = $_SESSION['roleID'];



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
                        <label class="control-label">Staff Name</label>
                        <div class="controls">
                            <input type="text" name="staff-name" id="required" value="<?php echo $staff_name;?>" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="text" name="staff-email" id="required" VALUE="<?php echo $email;?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile</label>
                        <div class="controls">
                            <input type="text" name="staff-mobile" id="required" value="<?php echo $mobile;?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" id="required" value="<?php echo $username;?>" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="required" value="<?php echo $password;?>" required>
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
                        <th>Programme</th>
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
