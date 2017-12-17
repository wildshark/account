<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30-Jun-17
 * Time: 8:00 AM
 */
include_once "config/config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login="SELECT * FROM user_account WHERE userName='$username' AND userPasswd='$password'";
$login=$conn->query($login);
$r=$login->fetch_assoc();
if ($r['userName']==$username AND $r['userPasswd']==$password){

    $_SESSION['userID']=$r['userID'];
    $_SESSION['roleID']=$r['roleID'];
    $_SESSION['login_status']=$r['statusID'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$r['userPasswd'];

    //add private details
    $_SESSION['login_full_name']=$r['full_name'];
    $_SESSION['login_mobile']=$r['mobile'];
    $_SESSION['login_email']=$r['email'];

    header("location: account.php?user=dashboard&error=0&alert=0c={$r['roleID']}");
}else{
    include_once "config/config.php";
    include_once 'template/login.php';
    session_destroy();
}
