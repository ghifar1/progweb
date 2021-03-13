<?php
    $file = file_get_contents('controller/auth.txt');
    $line = explode(",", $file);
    foreach ($line as $key => $user) {
        $line[$key] = explode("|", $user);
    }
    print_r($line);

    foreach ($line as $key => $value) {
        print_r($line[$key][0]);
        if($line[$key][0] == $email)
        {
            echo "KETEMU";
        }
    }
    

?>