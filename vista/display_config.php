<?php

$filename = dirname(dirname(__FILE__)) . "/config/library.php";
$config_file = fopen($filename, 'r') or die("Unable to open file!!");

// Output one line until end-of-file
while(!feof($config_file)) {
  echo fgets($config_file) . "<br>";
}
fclose($config_file);

