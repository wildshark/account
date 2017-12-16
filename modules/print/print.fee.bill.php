<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14-Dec-17
 * Time: 12:59 AM
 */

$year=$_GET['y'];
$semester=$_GET['ss'];
$student=$_GET['s'];

$check = "SELECT * FROM `get_print_fees_details`  WHERE yearID = '$year' and semesterID='$semester' and studentID='$student'";
$check = $conn->query($check);
$c=$check->fetch_assoc();

if ($c['yearID'] == $year and $c['semesterID']==$semester and $c['studentID']==$student){

    function print_student_profile($conn,$student){

        $profile="select * from get_student_list WHERE studentID='$student'";
        $profile=$conn->query($profile);
        $p=$profile->fetch_assoc();

        echo"
        <span style='font-size:14px;float:left; width:100%;'>
                <B>".$p['studentName']."</B>
        </span>
        <span style='font-size:14px;float:left;width:100%;'>
                ".$p['admissionNo']."<br>
                ".$p['mobile']." ,
        </span>
        <span style='font-size:14px;float:left;width:100%;'>
			    ".$p['course']."
			    ".$p['prefix']."
		</span>
    ";
    }

    function print_fees_bill($conn,$year,$semester,$student){

        $bill = "SELECT * FROM `get_print_fees_details`  WHERE yearID = '$year' and semesterID='$semester' and studentID='$student'";
        $bill = $conn->query($bill);
        while ($b = $bill->fetch_assoc()) {
            echo "
        <div style='width:100%;float:left;'>
            <span style='float:left; text-align:left;padding:10px;width:50%;color:#888;'>
            " . $b['revenue'] . "
            </span>
                <span style='font-weight:normal;float:left;padding:10px ;width:40%;color:#888;text-align:right;'>
                " . $b['amount'] . "
            </span>
        </div>
    ";
        }
    }

    function print_fees_total($conn,$year,$semester,$student){

        $bill ="SELECT * FROM get_printout_total WHERE semesterID = '$semester' AND
studentID = '$student' AND yearID = '$year' GROUP BY yearID,semesterID,studentID";
        $bill = $conn->query($bill);
        $b = $bill->fetch_assoc();

        echo"
            <span style='font-weight:600;float:right;padding:10px 0px;width:40%;color:#666;text-align:center;'>
               Total : ".$b['total']."
            </span>
        ";
    }

    function print_invoice_no($conn){
        $invoice ="SELECT Count(get_printout_total.yearID) as ivn FROM get_printout_total";
        $invoice = $conn->query($invoice);
        $i = $invoice->fetch_assoc();

        echo date('Hi')."". $i['ivn'];
    }
}else{
    echo"error";
}


