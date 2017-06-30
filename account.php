<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 8:01 PM
 */
include_once "config/config.php";

if (!empty($_GET['transaction'])){
    include_once "transaction.php";
}else{
    include_once "dashboard.php";
}


