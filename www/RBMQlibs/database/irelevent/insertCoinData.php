<?php

//Writen By Richard Chipman for team Crypto Bros

include('/var/www/RBMQlibs/simpleapi.php');
include('../error_log.php');

function makeCoinTable($coinArr)
{

	require_once('./connect.php');

	ini_set('display_errors', 1);

		for ($i = 0; $i < 5; $i++){

		switch ($i) {

		case 0:
		   $coin = $coinArr['bitcoin'];
		break;
		case 1:
		   $coin = $coinArr['etherium'];
		break;
		case 2:
		   $coin = $coinArr['litecoin'];
		break;
		case 3:
		   $coin = $coinArr['bitcoincash'];
		break;
		case 4:
		   $coin = $coinArr['tron'];
		break;
	}


	$symbol = $coin['FROMSYMBOL'];
	$coinID = $coin['COINID'];
	$coinPrice = $coin['PRICE'];
	$lastUpdate = $coin['LASTUPDATE'];
	$volume24 = $coin['VOLUME24HOUR'];
	$openDay = $coin['OPENDAY'];
	$highDay = $coin['HIGHDAY'];
	$lowDay = $coin['LOWDAY'];
	$changePCT24Hour = $coin['CHANGEPCT24HOUR'];
	$totalVolume24H = $coin['TOTALVOLUME24H'];

	//IF YOU WOULD LIKE TO CHECK THE VALUES//
	/*
	echo"***********************";
	echo(PHP_EOL);
	echo($symbol);
	echo(PHP_EOL);
	echo($coinID);
	echo(PHP_EOL);
	echo($coinPrice);
	echo(PHP_EOL);
	echo($lastUpdate);
	echo(PHP_EOL);
	echo($volume24);
	echo(PHP_EOL);
	echo($openDay);
	echo(PHP_EOL);
	echo($highDay);
	echo(PHP_EOL);
	echo($lowDay);
	echo(PHP_EOL);
	echo($changePCT24Hour);
	echo(PHP_EOL);
	echo($totalVolume24H);
	echo(PHP_EOL);
	*/

	$insertCoinData = "INSERT INTO coinTable (symbol, coinID, coinPrice, lastUpdate, 24Volume, openDay, highDay, lowDay, changePct24Hour, totalVolume24H) VALUES (".$symbol.",'".$coinID."','".$coinPrice."','".$lastUpdate."','".$volume24."','".$openDay."','".$highDay."','".$lowDay."','".$changePCT24Hour."','".$totalVolume24H."')
	ON DUPLICATE KEY UPDATE
	coinPrice='".$coinPrice."', lastUpdate='".$lastUpdate."', 24Volume='".$volume24."', openDay='".$openDay."', highDay='".$highDay."', lowDay='".$lowDay."', changePct24Hour='".$changePCT24Hour."', totalVolume24H='".$totalVolume24H."'";
	//mysqli_query($conn,$insertCoinData) or die (mysqli_error($conn));
	if (!$conn->query($insertCoinData)) {
		echo "INSERT FAILED: (" . $conn->errno . ") " . $conn->error;
	}
		 }


	}
	makeCoinTable($theArray);
?>
