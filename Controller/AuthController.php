<?php

include '../Model/User.php';
use Model\User;

if(isset($_POST['email']) && isset($_POST['password']))
{
    $filename = 'auth.txt';
    $user = new User();
    $user->getData($filename);
    print_r($user->checkMatch($_POST['email'], $_POST['password']));

} else {
    echo 'Email maupun password wajib diisi';
}



?>