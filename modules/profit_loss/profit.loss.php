<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11-Sep-17
 * Time: 7:28 AM
 */

if ($_GET['submit']== 'pl'){
    if (empty($_GET['year'])){
        header("location: account.php?user=profit.loss&error=1&alert=3");
    }elseif(empty($_GET['start-date'])) {
        header("location: account.php?user=profit.loss&error=1&alert=3");
    }elseif(empty($_GET['end-date'])){
        header("location: account.php?user=profit.loss&error=1&alert=3");
    }else {
        $end_date = $_GET['end-date'];
        $end = date('Y-m-d', strtotime($end_date));

        $start_date = $_GET['start-date'];
        $start = date('Y-m-d', strtotime($start_date));

        $year = $_GET['year'];


        function get_fees_revenue_summary($conn,$start,$end){

            $fees_revenue="select * from get_pl_fees_revenue WHERE jDate BETWEEN '{$start}' AND '{$end}'";
            $fees_revenue=$conn->query($fees_revenue);
            while($r=$fees_revenue->fetch_assoc()){
                echo"
                    <tr class='gradeX'>
                        <td class='center'><a href='account.php?user=fees.income.details&data=".$r['revenueID']."&sort=".$r['revenue']."&error=0&alert=1'>".$r['revenue']."</a> </td>
                        <td>" . $r['total'] . "</td>
                    </tr>";


            }
        }

        //query get_profit_loss_expenditure_n2
        function get_profit_loss_expenditure($conn, $start, $end){

            $expenses = "SELECT tranCatID,ledger,Sum(dr) As expenses ,Sum(cr)FROM get_profit_loss_expenditure_n2 WHERE GL_date BETWEEN '".$start."' AND '".$end."' GROUP BY bookID,tranCatID";

            $expenses_result = $conn->query($expenses);
            while ($e = $expenses_result->fetch_assoc()) {
                echo "
                <tr class='gradeX'>
                    <td class='center'><a href='account.php?user=expenditure.details&data=".$e['tranCatID']."&sort=".$e['ledger']."&error=0&alert=1'>" . $e['ledger'] . "</td>
                    <td>" . $e['expenses'] . "</td>
                </tr>
            ";
            }

        }

        function profit_loss_calculation($conn,$start,$end){

            $total_income = "SELECT Sum(get_pl_fees_revenue.total) AS total_income,jDate FROM get_pl_fees_revenue WHERE jDate BETWEEN '{$start}' AND '{$end}' GROUP BY jDate";
            $total_income = $conn->query($total_income);
            $income = $total_income->fetch_assoc();
            if ($income['total_income'] == 0.00 || empty($income['total_income'])){
                $income="0.00";
            }else{
                $income=$income['total_income'];
            }

            $total_expenditure="SELECT get_profit_loss_expenditure_n2.GL_date, Sum(get_profit_loss_expenditure_n2.dr) AS total_exp FROM get_profit_loss_expenditure_n2 WHERE get_profit_loss_expenditure_n2.GL_date BETWEEN '{$start}' AND '{$end}' GROUP BY get_profit_loss_expenditure_n2.GL_date";
            $total_expenses = $conn->query($total_expenditure);
            $expenses = $total_expenses->fetch_assoc();
            if ($expenses['total_exp'] == 0.00 || empty($expenses['total_exp'])){
                $expenses="0.00";
            }elseif(is_null($expenses['total_exp'])) {
                $expenses="0.00";
            }else{
                $expenses=$expenses['total_exp'];
            }

            $profit_before_tax = $income - $expenses;
            $tax_payable=($profit_before_tax*(25/100));
            $profit_after_tax=($profit_before_tax-$tax_payable);

            echo "
                <div class='span4'>
                    <div class='widget-box'>
                        <div class='widget-title'> <span class='icon'> <i class='icon-align-justify'></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class='widget-content nopadding'>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Details</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class='gradeX'>
                                        <td class='center'>Total Revenue</td>
                                        <td>" . $income. "</td>
                                    </tr>
                                    <tr>    
                                        <td class='center'>Less Administrative Cost</td>
                                        <td>" . $expenses. "</td>
                                    </tr>
                                    <tr>    
                                        <td class='center'>Profit After Interest Before Tax</td>
                                        <td>" .$profit_before_tax. "</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='span4'>
                    <div class='widget-box'>
                        <div class='widget-title'> <span class='icon'> <i class='icon-align-justify'></i> </span>
                            <h5>Personal-info</h5>
                        </div>
                        <div class='widget-content nopadding'>
                            <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>Tax Payable</td>
                                        <td>".$tax_payable."</td>
                                    </tr>
                                    <tr>
                                        <td>Profit After Tax</td>
                                        <td>".$profit_after_tax."</td>
                                    </tr>
                                    <tr>
                                        <td>Tax Payable</td>
                                        <td>0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ";
        }
    }
}
