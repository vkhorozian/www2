<?php

session_start();
required_once(/* database connector script */);

$name = $_POST['user'];
$password = $_POST['password'];


$password = md5($password);

$statement = /* insert statement we need */;

if ($conn->exec($statement))

{
	echo "User account created";
}


?>