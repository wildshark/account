<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09-Jul-17
 * Time: 10:47 PM
 */
if(!isset($_GET['book'])){
    $type ="";
}else{
   $type=$_GET['book'];
}
if (!isset($_GET['data'])){
    $ledgerID='';
}else{
    $ledgerID=$_GET['data'];
}

function data_sheet_ledger($conn,$ledgerID){
    $data="SELECT * FROM get_ledger WHERE tranCatID='$ledgerID'";
    $data=$conn->query($data);
    while ($r=$data->fetch_assoc()){
        if ($r['tranTypeID']==1){
            $typeID="Cash";
        }elseif ($r['tranTypeID']==2){
            $typeID="Bank";
        }else{
            $typeID="Order";
        }

        if($r['semesterID']==1){
            $semester="1st Semester";
        }elseif ($r['semesterID']==2){
            $semester="2st Semester";
        }
        echo "
            <tr>
               <td>".$r['GL_date']."</td>
               <td>".$semester."</td>
               <td>".$r['description']."</td>
               <td>".$r['refNo']."</td>
               <td>".$typeID."</td>
               <td>".$r['qouteDr']."</td>
               <td>".$r['qouteCr']."</td>
            </tr>
        ";
    }
}
function summary_ledger($conn,$ledgerID){
    $data="SELECT * FROM get_ledger_calculator WHERE tranCatID='$ledgerID' ";
    $data=$conn->query($data);
    $r=$data->fetch_assoc();
    echo "
        <tr>
            <td>Debit</td>
            <td>".$r['Dr']."</td>
        </tr>
        <tr>
            <td>Credit</td>
            <td>".$r['Cr']."</td>
        </tr>
        <tr>
            <td>Balance</td>
            <td>".$r['balance']."</td>
        </tr>
    ";
}


?>
<div class="row-fluid">
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
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php summary_ledger($conn,$ledgerID)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
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
                        <th>Session</th>
                        <th>Details</th>
                        <th>Ref. No#</th>
                        <th>Trans No#</th>
                        <th>Debt</th>
                        <th>Credit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php data_sheet_ledger($conn,$ledgerID)?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
