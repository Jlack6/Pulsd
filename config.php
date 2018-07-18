<?php

define('DB_SERVER', 'xo3.x10hosting.com');
define('DB_USERNAME', 'pract147');
define('DB_PASSWORD', 'Lambo1896');
define('DB_NAME', 'pract147_pulsd');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
