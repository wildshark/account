<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 6:20 PM
 */
function get_fees_list($conn){
    $sql="SELECT * FROM get_fees_price_list";
    $data=$conn->query($sql);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td>".$r['school']."</td>
               <td>".$r['course']."</td>
               <td>".$r['amount']."</td>
               <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>
        ";
    }

}

?>
<div class="row-fluid">
    <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">School </label>
                        <div class="controls">
                            <select name="school">
                                <?php school_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Course </label>
                        <div class="controls">
                            <select name="course">
                                <?php course_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Amount </label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="amount" type="text" placeholder="0.000" class="span11">
                                <span class="add-on">GHc</span> </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="ticket" value="">
                        <input type="hidden" name="transaction" value="fees.e">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span6">
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
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php get_fees_list($conn)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
