<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17-Dec-17
 * Time: 6:46 AM
 */

$role = $_SESSION['roleID'];

$user_data="SELECT * FROM get_user_list WHERE userID='$role'";
$user_data=$conn->query($user_data);
$user=$user_data->fetch_assoc();


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
                <form class="form-horizontal" method="GET" action="account.php" name="basic_validate" id="basic_validate">
                    <input type="hidden" name="transaction" value="user.profile">
                    <input type="hidden" name="id" value="<?php echo $role; ?>">
                    <div class="control-group">
                        <label class="control-label">Staff Name</label>
                        <div class="controls">
                            <input type="text" name="staff-name" id="required" value="<?php echo $user['full_name'];?>" required='required'>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" name="staff-email" id="email" VALUE="<?php echo $user['email'];?>" required='required'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Mobile</label>
                        <div class="controls">
                            <input type="text" name="staff-mobile" id="required" value="<?php echo $user['mobile'];?>" required='required'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" id="required" value="<?php echo $user['userName'];?>" required='required'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="required" value="<?php echo $user['userPasswd'];?>" required='required'>
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

            </div>
        </div>
    </div>
</div>
