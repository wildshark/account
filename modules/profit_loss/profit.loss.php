<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Sep-17
 * Time: 7:28 AM
 */

 $year=$_GET['year'];
 $start_date=$_GET['start-date'];
 $end_date=$_GET['end-date'];


//query get_profit_loss_expenditure_n2
function get_profit_loss_expenditure($conn,$start_date,$end_date){

    $n2="SELECT tranCatID,ledger,Sum(dr) As expenses ,Sum(cr)FROM get_profit_loss_expenditure_n2
    WHERE GL_date BETWEEN '{$start_date}' AND '{$end_date}' 
    GROUP BY bookID,tranCatID";

    $expenses_result=$conn->query($n2);
    while ($e=$expenses_result->fetch_assoc()){
        echo "
            <tr class='gradeX'>
                <td class='center'>".$e['ledger']."</td>
                <td>".$e['expenses']."</td>
            </tr>
        ";

    }
}

