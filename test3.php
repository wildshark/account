<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04-Jan-18
 * Time: 9:21 AM
 */


if (isset($_GET['password'])){
    $password = $_GET['password'];
    $code = md5(md5($password, true));
    echo $code;

}else{
  $password="";

}

if (isset($_GET['pass-input'])){
    $pw = $_GET['pass-input'];

    if (md5(md5($pw, true)) == '5bd065f4e12085279ae3a61a5752e5eb' ){
        echo "password is ok";
    }else{
        echo "password is wrong";
    }
}

?>

<htmL>
<head>
    <title>test</title>
</head>
<body>
<form action="test3.php" method="get">
    <input type="text" name="password">
    <input type="text" name='pass-input'>
    <button type="submit" name="submit">ok</button>
</form>
</body>
</htmL>

