<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 10-Nov-17
 * Time: 3:25 PM
 */


$error= $_GET['error']; //error message
$alert=$_GET['alert']; //message box type

switch ($error){
    case 1:
        $msg="A text field was find empty, try again";
    break;
    case 2:
        $msg="Record was successfully submit";
    break;
    case 3:
        $msg="Student's profile exist in the database";
    break;
    case 4:
        $msg="Record has been delete";
    break;
    default:
       $msg ="Fill in all text field";
}

function alert_box_type($alert,$msg){

    if ($alert== 1){ //information
        $alert_box="alert alert-info alert-block";
    }elseif ($alert == 2){ //success
        $alert_box="alert alert-success alert-block";
    }elseif ($alert == 3){ //error
        $alert_box="alert alert-error alert-block";
    }

    if ($alert== 1){ //information
        $alert_label="Info";
    }elseif ($alert == 2){ //success
        $alert_label="Success";
    }elseif ($alert == 3){ //error
        $alert_label="Error";
    }

    return "<div class='".$alert_box."'> <a class='close' data-dismiss='alert' href='#'>×</a>
              <h4 class='alert-heading'>".$alert_label."</h4>
              ".$msg."</div>";

}







