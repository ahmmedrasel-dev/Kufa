<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'rasel');

$db_connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$db_connect){
    echo "Database Not connected";
}



?>