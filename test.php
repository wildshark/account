<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06-Aug-17
 * Time: 9:01 AM
 */

include_once "config/config.php";
$date = new DateTime('now');
$date->modify('last day of this month');
echo $date->format('Y-m-d');