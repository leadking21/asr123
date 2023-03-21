<?php
session_start();
include("config.php");

$text = "".$_GET['ip']."/".$_GET['key']."\n";
$filename = "ip-list.txt";
$fh = fopen($filename, "a");
fwrite($fh, $text);
fclose($fh);
echo "<script> window.close() </script>";



?>