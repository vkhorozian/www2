<?php
//
//include_once ("function.php");
include_once("../ricky/simpleapi.php"); // this is giving me an array called cooin list when i call a function
//include_once('api.php');

/*
 * Created by PhpStorm.
 * User: vkhor
 * Date: 4/18/2017
 * Time: 4:59 PM
 */




$coinList = array();

$pageKeys = "homepage"; // this is the cases that the API switch statement to decide what API key you need for this webpage

$array = runAPI($pageKeys); // this is the function i run to recieve all of the coins from the api

//
//$coinList = runHome();

//print_r($coinList);

//print_r($array);


//test array of arrays see how to print this using a for loop
$arr1 = array(1, 2, 3, 4);
$arr2 = array(11, 22, 33, 44);
$arr3 = array(111, 222, 333, 444);
$mid1 = array($arr1,$arr2,$arr3);

$arr11 = array(12, 22, 32, 42);
$arr22 = array(112, 222, 332, 442);
$arr33 = array(1112, 2222, 3332, 4442);
$mid2 = array($arr11,$arr22,$arr33);

$arr111 = array(13, 23, 33, 43);
$arr222 = array(113, 223, 333, 443);
$arr333 = array(1113, 2223, 3333, 4443);
$mid3 = array($arr111,$arr222,$arr333);

$kingarr = array($mid1,$mid2,$mid3);



echo "\n" . "\n" . "\n" . "\n";
/*
for($i = 0 ; $i < 3 ; $i++){ // mid1
    //echo $kingarr[$i] . "\n";
    for ($j = 0; $j < 3 ; $j++){ //arr1
       // echo $kingarr[$j] . "\n";
        for ($z = 0 ; $z < 4 ; $z++) // 1
            echo $array[$i][$j][$z] . "\n";
    }
}


//////////////////////////////////////////////////

    <section>
    <?php if ($array->num_rows > 0): ?>
        <table>
            <tr>
                <th>Coin Symbol</th>
                <th>Price</th>
                <th>Volume</th>
                <th>Percent Change</th>
            </tr>

            <?php while($row = $array->fetch_assoc()) : ?>
            <tr>
                <td><?php $row[""] ?></td>
                <td><?php $row["Email"] ?></td>
                <td><?php $row["Email"] ?></td>
            </tr>

        </table>
    </section>


foreach ($array as $key => $value) :
    echo $key . $value['bitcoin'];
endforeach;

*/

print_r($array);


//foreach ($coinList as $key => $value) :
 //   echo $coins['bitcoin'];
//endforeach;

$stuff = "stufffasljkdfhalkjwsehf";
//$transactions = admin_get_trans_data();

?>
<!DOCTYPE html5>

<html>
<head><title>Admin Homepage</title><link rel="stylesheet" type="text/css" href="main.css"></head>
<body>
<main>
    <h1>View Details of Acounts</h1>
    <section>
        <h2>accounts</h2>
        <table>
            <tr>
                <th>Coin Symbol</th>
                <th>Price</th>
                <th>Volume</th>
                <th>Percent Change</th>
                <th><?php echo "<h1> $stuff </h1>"?></th>
            </tr>
            <?php foreach ($coinList as $line_item => $price) : ?>
                <tr>
                    <td><?php echo "$coins"; ?></td>
                    <td><?php echo "$$price"; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>


    <br>
    <br>


    <div  onclick="location.href='random.html;" >
        <p> this should send me to a random page i just made</p>
    </div>
    <div onclick="window.open('random.html','mywindow');" style="cursor: pointer;">&nbsp; f</div>
    <br>
    <br>

    <form  method="post" action = "login.php" >
        <h4>This will redirect you to login page</h4>
        <input type="submit">

    </form>

    <form method="post" action="add_user.html" >
        <h4>Add User</h4>
        <input type="submit">
    </form>


    <form method="post" action = "delete_user.html">
        <h4>Delete User</h4>
        <input type="submit">
    </form>




</main>
</body>
</html>

