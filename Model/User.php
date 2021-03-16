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
        $line = explode("\n", $file);
        foreach ($line as $key => $value) {
            $line[$key] = explode("|", $value);
        }
        $this->data = $line;
    }

    public function checkMatch($email, $password)
    {
        for($i=0; $i < 3; $i++)
        {
            
            if(preg_replace('/\s+/', '', $this->data[$i][1]) == $password)
            {
                $this->found = true;
            }

        }

        if($this->found)
        {
                
                return "OK";
        } else {
                return "FAILED";
        }
    }
}

?>