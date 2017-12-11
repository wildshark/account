<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Sep-17
 * Time: 7:03 AM
 */
?>
<div class="row-fluid">
    <div class="span5">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="transaction.php" method="get" class="form-horizontal">
                    <input type="hidden" name="transaction" value="profit.loss">
                    <input type="hidden" name="error" value="0">
                    <input type="hidden" name="alert" value="1">
                    <div class="control-group">
                        <label class="control-label">Session </label>
                        <div class="controls">
                            <select name="year" >
                                <?php year_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Date picker (dd-mm)</label>
                        <div class="controls">
                            <input type="text" name="start-date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y');?>" class="datepicker span11">
                            <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Date picker (dd-mm)</label>
                        <div class="controls">
                            <input type="text" name="end-date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y');?>" class="datepicker span11">
                            <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="pl" class="btn btn-success">Query</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="span7">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Personal-info</h5>
            </div>
            <div class="widget-content nopadding">
                Personal-infoPersonal-infoPersonal-infoPersonal-infoPersonal-info
            </div>
        </div>
    </div>
</div>
