#! bin/usr/php
<?php
$path = $_SERVER['DOCUMENT_ROOT'] . 'config.php';
require_once($path);

/*SQL connection*/
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


/*Checking Connection*/
if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
}
else{
     echo "connection was successful to database";
}

ini_set('display_errors', 1);//Error checking

?>
