<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17-Dec-17
 * Time: 5:42 PM
 */


$action=$_GET['submit'];
if ($action == 'validate'){

    $staffID=$_GET['id'];
    $name=$_GET['staff-name'];
    echo $email=$_GET['staff-email'];
    $mobile=$_GET['staff-mobile'];
    $username=$_GET['username'];
    $password=$_GET['password'];

    $sql="UPDATE `user_account` SET `full_name`='$name', `mobile`='$mobile', `email`='$email', `userName`='$username', `userPasswd`='$password' WHERE (`userID`='$staffID') LIMIT 1";
    $sql=$conn->query($sql);

    header("location: account.php?user=user-profile&error=8&alert=2&c={$roleID}");
}else{
   header("location: account.php?user=user-profile&error=0&alert=1&c={$roleID}");
}