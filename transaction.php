<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 2:27 PM
 */


switch ($_GET["transaction"]){
    case "expenditure";
        include_once "config/config.php";
        include_once "modules/expenditure/add.expenditure.record.php";
        break;
}
