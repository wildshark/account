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
    $_SESSION['username']=$username;
    header("location: account.php?user=dashboard");
}else{
    include_once "config/config.php";
    include_once 'template/login.php';
    session_destroy();
}
