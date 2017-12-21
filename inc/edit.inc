<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20-Dec-17
 * Time: 5:06 PM
 */

include_once "alert/alert.php";

if (empty($_SESSION['userID'])){
    session_destroy();
    header("location: index.php");
}else{
    switch ($_GET['edit']){

        case"student-data";
            include_once "config/config.php";
            include_once "modules/get.global.function.php";
            $page->contenttitle="Student Data";
            $page->views="views/student/student.edit.php";
            include_once "template/form.validation.php";
        break;


    }
}