<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 1:49 PM
 */


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

function expenses_list($conn){
    $list="SELECT * FROM expenses_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['TranCatID']."'>".$l['ledger']."</option>";
    }
}

function expenses_due_for_payment_list($conn){
    $list="SELECT * FROM expenses_pay_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['tranCatID']."'>".$l['ledger']."</option>";
    }
}
function school_list($conn){
    $list="SELECT * FROM school";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['schoolID']."'>".$l['school']."</option>";
    }
}

function course_list($conn){
    $list="SELECT * FROM course";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['courseID']."'>".$l['course']."</option>";
    }
}

function student_list($conn){
    $list="SELECT * FROM student_profile";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['studentID']."'>".$l['AdmissionNo']." - ".$l['studentName']."</option>";
    }
}

function year_list($conn){
    $list="SELECT * FROM session";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['year']."'>".$l['year']."</option>";
    }
}

function bank_name_list($conn){
    $list="SELECT * FROM get_bank_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['bankID']."'>".$l['bank']."</option>";
    }
}

function position_list($conn){
    $list="SELECT * FROM get_position_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['positionID']."'>".$l['position']."</option>";
    }
}

function staff_list($conn){
    //get_staff_profile_list
    $list="SELECT * FROM get_staff_profile_list";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['staff_profile_ID']."'>".$l['staffName']."</option>";
    }
}
