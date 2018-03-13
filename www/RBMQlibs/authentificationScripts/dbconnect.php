<?php

session_start();

$servername = 'localhost';
$username = 'varouj';
$db = 'it490';
$password = 'admin';

$conn = new mysqli($servername, $username, $password);

/*check connection */

if ($conn->connect_error)
{
	die("Connection failed: ".  $conn->connect_error);
}
echo "Connected";
?>
