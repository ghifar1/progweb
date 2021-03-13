<?php

namespace Model;

class User{
    public $data = "";
    public $found = false;
    public function getData($filename)
    {
        $fileopen = fopen($filename, "r") or die ("file gagal dibuka");
        $file = fread($fileopen, filesize($filename));
        fclose($fileopen);
        $line = explode(",", $file);
        foreach ($line as $key => $value) {
            $line[$key] = explode("|", $value);
        }
        $this->data = $line;
    }

    public function checkMatch($email, $password)
    {
        echo "Email : ".$email." Password : ".$password."<br>"; 
        for($i=0; $i < 3; $i++)
        {
            echo "------ <br>";
            echo $this->data[$i][0]."<br>";
            echo $this->data[$i][1]."<br>";
            if($this->data[$i][0] == $email)
            {
                echo "COCOK <br>";
            }
            echo "------ <br>";
        }
    }
}

?>