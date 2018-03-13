<?php
	session_start();
	require_once('dbconnect.php');
	$email = $_POST["Email"];
	$password = $_POST["password"];
	//using MD5 for security before inserting into database.
	$password = md5($password);
	$loggedIn= false;
	$statement = mysqli_fetch_row(mysqli_query(/* sql statement */));
	
	if($email==$statement[1] && $password==$statement[2])
	{
		$loggedIn=true;
		$_SESSION["Name"]=$statement[0];
		$_SESSION["Email"]=$statement[1];
		$_SESSION["userID"]=$statement[3];
		$_SESSION["LoggedIn"]=$loggedIn;
	}
	return $loggedIn;
?>