<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:41 PM
 */

//database connection
include_once "db/conn.php";

//Date and Time setting
date_default_timezone_set("Africa/Accra");

//transaction Date and time
$tranDate=date("d-m-Y h:i:s");

//session
session_start();

//page class
$page = new stdClass();

$page->header="Account";
$page->title="Account";
$page->contenttitle="Account";
$page->url="";
$page->copyright=" 2012 - ".date("Y")." &copy; iQuipe Digital Enterprises";
$page->views="views/default.views.php";



