<?php
//session_start();
include_once ('function.php');
/**
 * Created by PhpStorm.
 * User: vkhor
 * Date: 4/26/2017
 * Time: 6:25 PM
 */



    $username = filter_input(INPUT_POST, 'user_name'); echo "the username is ".$user_name.'<br>';
    $password = filter_input(INPUT_POST, 'password'); echo "the pass is ".$pass.'<br>';
    $email = filter_input(INPUT_POST, 'email'); echo "the email is ".$email.'<br>';

    $type = "insert_user"; // this is what rabbit is supposed to use

    $user_data = array();
    $user_data['type'] = "$type";
    $user_data['username'] = "$username";
    $user_data['password'] = "$password";
    $user_data['email'] = "$email";

    $responce = runClient($user_data);


    $message = "added user";
    $url = "login.html";

    redirect($message,$url);



?>


