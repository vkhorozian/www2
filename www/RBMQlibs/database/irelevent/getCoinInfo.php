<?php

//Writen By Richard Chipman for team Crypto Bros
//Is used to take the coinTable data out of the database to send to another machine

include('../error_log.php');

function getCoinData(){

require_once('./connect.php');

ini_set('display_errors', 1);

$retrieveCoinData = "SELECT * from coinTable";


    if ($result = mysqli_query($conn, $retrieveCoinData)) {

        /* fetch associative array */
        $count = 0;

        //while ($all = mysqli_fetch_all($result)) {
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        	//print_r($all);

        //}

        /* free result set */
        mysqli_free_result($result);
        print_r($all);
    }
    mysqli_close($conn);
}

getCoinData();
?>
