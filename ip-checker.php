<?php
session_start();



    if (file_exists("ip-list.txt")) {
    $search = $_SESSION['ipadd'];
    $lines = file('ip-list.txt');

    // Store true when the text is found
    $found = false;
 


    foreach($lines as $line)
    {
      if(strpos($line, $search) !== false)
      {
        $found = true;
        $keyfound = explode("/", $line);
        echo rtrim($keyfound[1]);
   
        $lines = str_replace($line, "", $lines);
        file_put_contents("ip-list.txt", $lines);


      }
    }


    if(!$found)
    {
      echo '';
    }

    }else{
        fopen("ip-list.txt", "a");

    }


?>