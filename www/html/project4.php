<?php


//Config file for mysql database
$path = $_SERVER['DOCUMENT_ROOT'] . '/scripts/config.php';
require_once($path);
/*SQL connection*/
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$path2 = $_SERVER['DOCUMENT_ROOT'] . '/rabbitMQStuff/rabbitmqphp_example/testRabbitMQClient.php';
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
    require_once($path2);
//:sendAuthRequest($enteredUsername, $enteredPassword);
   /* Need to change this query with the tables created in linux//
    $sql = "SELECT * FROM auth HAVING username = '$enteredUsername' && password = '$enteredPassword'";
    $usernameQuery = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $num_rows = $usernameQuery->num_rows; 
    echo "Matches Found: " . $num_rows;
 
    if($num_rows == 0){
	$message1 = "Login Not Correct";
	echo "<script type='text/javascript'>alert('$message1');</script>"; 
    }
    else{
	$message2 = "Login Successful:";
	echo "<script type='text/javascript'>alert('$message2');</script>";
	echo '<script type="text/javascript">
		window.location = "https://web.njit.edu/~rlc9/p2ForP4.php"
	</script>';
  }*/

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

