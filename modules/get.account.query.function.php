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
    $list="SELECT * FROM expenses_list_";
    $list=$conn->query($list);
    while ($l=$list->fetch_assoc()){
        echo "<option value='".$l['TranCatID']."'>".$l['ledger']."</option>";
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
        echo "<option value='".$l['studentID']."'>".$l['studentName']."</option>";
    }
}