<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 1:49 PM
 */

// Function to get the client IP address
function get_client_ip() {
    $ip_address = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip_address = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip_address = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ip_address = $_SERVER['REMOTE_ADDR'];
    else
        $ip_address = 'UNKNOWN';
    return $ip_address;
}

//function generate 4 digital pin
function ticket_generator($length=4){
    $result="";
    $chars="123456789QWERTYUIPLKJHGFDSAZXCVBNM";
    $charArray=str_split($chars);
    for ($i = 0; $i < $length; $i++){
        $randItem=array_rand($charArray);
        $result .="".$charArray[$randItem];
    }
    return $result;
}

//function expenses list combo
function expenses_list($conn){
    $list="SELECT * FROM expenses_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['TranCatID']."'>".$l['ledger']."</option>";
    }
}

//funcation expenses due for payment combo
function expenses_due_for_payment_list($conn){
    $list="SELECT * FROM expenses_pay_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['tranCatID']."'>".$l['ledger']."</option>";
    }
}

//function school list combo
function school_list($conn){
    $list="SELECT * FROM school";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['schoolID']."'>".$l['school']."</option>";
    }
}

//course list combo
function course_list($conn){
    $list="SELECT * FROM course";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['courseID']."'>".$l['course']."</option>";
    }
}

//student name and admission no list combo
function student_list($conn){
    $list="SELECT * FROM student_profile";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['studentID']."'>".$l['admissionNo']." - ".$l['studentName']."</option>";
    }
}

//session list combo
function year_list($conn){
    $list="SELECT * FROM session";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['year']."'>".$l['year']."</option>";
    }
}

//name of ghana banks list combo
function bank_name_list($conn){
    $list="SELECT * FROM get_bank_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['bankID']."'>".$l['bank']."</option>";
    }
}

//staff position list combo
function position_list($conn){
    $list="SELECT * FROM get_position_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['positionID']."'>".$l['position']."</option>";
    }
}

//staff name and id list combo
function staff_list($conn){
    //get_staff_profile_list
    $list="SELECT * FROM get_staff_profile_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['staff_profile_ID']."'>".$l['staffName']."</option>";
    }
}

//school session list combo
function school_session($conn){
    //get_staff_profile_list
    $list="SELECT * FROM get_session";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['year']."'>".$l['year']."</option>";
    }
}

//Payroll: get the last date of the month
function last_date(){
    $date = new DateTime('now');
    $date->modify('last day of this month');
    echo $date->format('Y-m-d');
}

//Course: get the Total Number of course per Schoool
function NoOfCourse_data($conn){
    $data="SELECT * FROM get_count_course_for_sch";
    $data=$conn->query($data);
    while($d=$data->fetch_assoc()){
        echo "
        <tr class='gradeX'>
            <td>".$d['school']."</td>
            <td>".$d['prefix']."</td>
            <td>".$d['NoOfCourse']."</td>
        </tr>";
    }
}

