<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 9:53 PM
 *
 * <td><a href='transaction.php?transaction=delete&c=fees&data=".$r['feesID']."' class='tip-top' data-original-title='Delete'><i class='icon-remove'></i></a></td>
 */

$id= $_GET['data'];
if ($_GET['c']=="fees"){
 $data=$conn->query("DELETE FROM `fees_price_list` WHERE (`feesID`='$id')");
 header("location: ". $_SERVER['HTTP_REFERER']);
}

if ($_GET['c']=="pay"){
    $data=$conn->query("DELETE FROM `general_legder` WHERE (`GL_ID`='$id')");
    header("location: ". $_SERVER['HTTP_REFERER']);
}