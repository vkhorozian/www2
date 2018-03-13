<?php

function doLogin($array)
{
    $username = $array['username'];
    $password = $array['password'];

    {
        if($username != "test" and $password != "test") {
            return false;
        } else {
            return true;
        }
    }
}

function printData($array){
    return $array['username'] . $array['password'];
}

function sendMario(){
    if (1 == 1){
        return "This is comming from the server as the function runs mario it will return what ever i want it to";
    }else
        return 0;

}

function updateCoinsAPI($request){



}
?>