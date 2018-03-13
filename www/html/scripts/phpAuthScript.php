<?php
//path used to copy the address location of my html file so it only requires
//being followed by child directory in the next statement


$path = $_SERVER['DOCUMENT_ROOT'] . '/scripts/config.php';
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
ini_set('display_errors', 1);

if(isset($_POST['username'], $_POST['password']))
{
  $enteredUsername = $_POST['username'];
  $enteredPassword = $_POST['password'];
$sql = "SELECT * FROM auth HAVING username = '$enteredUsername' && password = '$enteredPassword'";
 $usernameQuery = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 $num_rows = $usernameQuery->num_rows;
 echo "Matches Found: " . $num_rows;

  if($num_rows == 0)
  {
    $message1 = "Login Not Correct";
    echo "<script type='text/javascript'>alert('$message1');</script>";
  }
  else
  {
    $message2 = "Login Successful:";
    echo "<script type='text/javascript'>alert('$message2');</script>";

    echo '<script type="text/javascript">
           window.location = "https://google.com"
      </script>';
  }

}

?>


