<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 03-Jan-18
 * Time: 1:04 PM
 */

?>
<form class='form-horizontal' method='get' action='account.php' name='number_validate' id='number_validate'>
    <input type="hidden" name="transaction" value="fees.confirmation.check">

    <div id="myAlert" class="modal hide" style="display: none;" aria-hidden="true">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Fees Payment</h3>
        </div>
        <div class="modal-body">
            <div class='control-group'>
                <label class='control-label'>Date</label>
                <div class='controls'>
                    <input type='date'  name='date' required='required' id='required' >
                </div>
            </div>
            <div class='control-group'>
                <label class='control-label'>Session</label>
                <div class='controls'>
                    <input type='number'  name='session' required='required' id='required' placeholder='e.g. 2017'>
                </div>
            </div>
            <div class='control-group'>
                <label class='control-label'>Admission Number</label>
                <div class='controls'>
                    <input type='text'  name='admission-number' required='required' id='required' placeholder='XXX/XXXX/XXXX'>
                </div>
            </div>
            <div class='control-group'>
                <label class='control-label'>Bill Serial Number</label>
                <div class='controls'>
                    <input type='text'  name='bill-serial-number' required='required' id='required' placeholder='BL20180102235553'>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Confirm</button>
            <a data-dismiss="modal" class="btn btn-danger" href="#">Cancel</a>
        </div>
    </div>
</form>
