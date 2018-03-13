#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('simpleapi.php');


function requestProcessor($request)
{
    echo "received request!!!\n".PHP_EOL;
    //var_dump($request);  //this is the request

    //this var dump will take all of the data that is coming from the client side and dump it into the $request Variable
    // echo "this is the request" . $request;
    if(!isset($request['type']))
    {
        return "ERROR: unsupported message type";
    }

    switch ($request['type']) // use this switch to add all of the functions that we will need to be calling.
    {
        case "runAPI":
            return runAPI($request);
    }

    return $request; //array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("DtestRabbitMQ.ini","sqlServer");

$server->process_requests('requestProcessor');

exit();


?>
