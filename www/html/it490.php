<?php


//Config file for mysql database
$path = $_SERVER['DOCUMENT_ROOT'] . '/scripts/config.php';
require_once($path);
/*SQL connection*/
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$path2 = '/home/ricky/rabbitmqphp_example/testScript.php';
require('/home/ricky/rabbitmqphp_example/error_log.php');

/*Checking Connection*/
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    ini_set('display_errors', 1);
}
else{
//echo "connection was successful to database";
ini_set('display_errors', 1);
}

ini_set('display_errors', 1);

if(isset($_POST['username'], $_POST['password'])) 
{
    $enteredUsername = filter_input(INPUT_POST, 'username');
ini_set('display_errors', 1);
    $enteredPassword = filter_input(INPUT_POST, 'password');
   // require_once($path2);
shell_exec(php $path2);
}

?>





<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Project 4</title>
</head>

<style>
table {
    position: relative;
    top: 100px;
    background-color: #000066;
    color: white;
  }
</style>
<body>
<h1> The Crypto Bros </h1>


<form action="project4.php" method="post" autocomplete="off">
  Username: <input type="text" name="username" id="username"><br>
  Password: <input type="password" name="password" id="password" autocomplete="off"<br>
  <input type="submit" value="Login">
</form>
</body>
</html>

