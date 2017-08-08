<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29-Jun-17
 * Time: 12:41 PM
 */

//database connection
include_once "db/conn.php";

//session
session_start();

//Date and Time setting
date_default_timezone_set("Africa/Accra");

//transaction Date and time
$tranDate=date("d/m/Y h:i:s");
$date=date("d/m/y");

//page content and label
$page = new stdClass();

$page->header="Account";
$page->title="Account";
$page->contenttitle="Account";
$page->url="";
$page->copyright=" 2012 - ".date("Y")." &copy; iQuipe Digital Enterprises";
$page->views="views/default.views.php";

/**
 *check the StaffID status,
 * from the login pass the staffID value into
 * a session and use it globally
**/
if(!isset($_SESSION['staffID'])) {
$staffID='';
}else{
    $staffID=$_SESSION['staffID'];
}

//session time control
$expiry = 1800 ;//session expiry required after 30 mins
if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
    session_unset();
    session_destroy();
}
$_SESSION['LAST'] = time();


