<?php

include_once("../../RBMQlibs/rabbitMQLib.inc");
include_once("../../RBMQlibs/testRabbitMQClient.php");
include_once ('function.php');





$user_name = filter_input(INPUT_POST, 'user_name');
$password = filter_input(INPUT_POST, 'password');

$type = "login";


//$client = runClient($type, $user_name, $password);

$user_data = array();
$user_data['type'] = "$type";
$user_data['$username'] = "$user_name";
$user_data['password'] = "$password";


$responce = runClient($user_data);


if($responce === true){

        $message = "This is the redirect, it worked coin view here i come";
        $url = "coin_view.php";
        redirect($message,$url);
}else{

        $message = "you got a false as a return";
        $url = "login.html";
        redirect($message,$url);

}







/*



try{
    $message = "This is the redirect";
    $url = "login.html";
    redirect($message,$url);
}catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}




function redirect ($message, $url)
{
    echo $message;
    header("refresh: 5 ; url = $url");
    exit();
}
*/
?>