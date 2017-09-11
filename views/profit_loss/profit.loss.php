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
            <div class="widget-title">
				<span class="icon">
					<i class="icon-info-sign"></i>
				</span>
                <h5>Data validation</h5>
            </div>
            <div class="widget-content nopadding">
                <form class="form-horizontal" method="get" action="transaction.php" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="control-group">
                        <label class="control-label">Year</label>
                        <div class="controls">
                            <select name="year">
                                <?php year_list($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Start Date (mm-dd)</label>
                        <div class="controls">
                            <div  data-date="12-02-2012" class="input-append date datepicker">
                                <input type="text" name="start-date" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                                <span class="add-on"><i class="icon-th"></i></span> </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">End Date (mm-dd)</label>
                        <div class="controls">
                            <div  data-date="12-02-2012" class="input-append date datepicker">
                                <input type="text" name="end-date" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                                <span class="add-on"><i class="icon-th"></i></span> </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="transaction" value="profit.loss">
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

            </div>
        </div>
    </div>
</div>
