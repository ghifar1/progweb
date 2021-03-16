<?php

include '../Model/User.php';
use Model\User;

session_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $filename = 'auth.txt';
    $user = new User();
    $user->getData($filename);
    $status = $user->checkMatch($_POST['email'], $_POST['password']);
    if($status == "OK")
    {
        $_SESSION['user'] = $_POST['email'];
        echo "success";
    } else {
        echo "failed";
    }

} else {
    echo 'Email maupun password wajib diisi';
}



?>