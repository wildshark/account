<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:41 PM
 */
include_once "db/conn.php";

date_default_timezone_set("Africa/Accra");

session_start();


$page = new stdClass();

$page->header="Account";
$page->title="Account";
$page->contenttitle="Account";
$page->url="";
$page->copyright=" 2012 - ".date("Y")." &copy; iQuipe Digital Enterprises";
$page->views="views/default.views.php";



