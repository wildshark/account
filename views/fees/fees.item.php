<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23-Aug-17
 * Time: 12:06 PM
 */

//international student
function get_fees_list_international($conn){
    $sql="SELECT * FROM get_fees_list WHERE statusID='2' ";
    $data=$conn->query($sql);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td>".$r['prefix']."</td>
               <td>".$r['tuition']."</td>
               <td>".$r['matriculation']."</td>
               <td>".$r['accept_fees']."</td>
               <td>".$r['medical_examin']."</td>
               <td>".$r['result_fees']."</td>
               <td>".$r['lab_fees']."</td>
               <td>".$r['indexing']."</td>
               <td>".$r['nmc_book']."</td>
               <td>".$r['clinical_fees']."</td>
               <td>".$r['graduation_fees']."</td>
               <td>".number_format($r['total_fees'],2)."</td>
               <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>
        ";
    }
}

//local student
function get_fees_list_local($conn){
    $sql="SELECT * FROM get_fees_list WHERE statusID='1' ";
    $data=$conn->query($sql);
    while ($r=$data->fetch_assoc()){
        echo "
            <tr>
               <td>".$r['prefix']."</td>
               <td>".$r['tuition']."</td>
               <td>".$r['matriculation']."</td>
               <td>".$r['accept_fees']."</td>
               <td>".$r['medical_examin']."</td>
               <td>".$r['result_fees']."</td>
               <td>".$r['lab_fees']."</td>
               <td>".$r['indexing']."</td>
               <td>".$r['nmc_book']."</td>
               <td>".$r['clinical_fees']."</td>
               <td>".$r['graduation_fees']."</td>
               <td>".number_format($r['total_fees'],2)."</td>
               <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
            </tr>
        ";
    }
}
?>

<div class="row-fluid">
    <div class="span12">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Fees Costing</a></li>
            <li><a data-toggle="tab" href="#menu1">For Local Student</a></li>
            <li><a data-toggle="tab" href="#menu2">For International Student</a></li>
        </ul>


    </div>
</div>

