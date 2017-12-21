<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 8:01 PM
 */
include_once "config/config.php";

if (!empty($_GET['transaction'])){
    include_once "inc/transaction.inc";
}elseif(!empty($_GET['user'])){
    include_once "inc/dashboard.inc";
}elseif(!empty($_GET['delete'])){
    include_once "inc/delete.inc";
}elseif (!empty($_GET['print'])){
    include_once "inc/print.inc";
}elseif (!empty($_GET['edit'])){
    include_once "inc/edit.inc";
}


