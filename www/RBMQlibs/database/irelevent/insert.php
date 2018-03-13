<?php

require_once('connect.php');//Makes sql connection


function insertUser($username, $password, $email)
{



    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    //Escape characters
    $username = mysqli_real_escape_string($conn, $username);
    $password_hash = mysqli_real_escape_string($conn, $password_hash);
    $email = mysqli_real_escape_string($conn, $email);

    while(true){//Randomize the userID

          $userID=(mt_rand(1,100));
          $checkTables = "SELECT userID from authTable where userID = '$userID'";
          $query = mysqli_query($conn, $checkTables);
          $numrows = mysqli_num_rows($query);

          if($numrows == 0){
        break;
          }
    }

    //Check for valid username registration
    $checkUsernameQuery = "SELECT * from authTable where userID = '$username'";
    $query = mysqli_query($conn, $checkUsernameQuery);
    $numrows = mysqli_num_rows($query);
    if($numrows > 0){//Need to send a message to the web server saying this shit not gunna happen
          $msg = "usernameError";
          return $msg;
    }


    $insertQuery = "INSERT INTO authTable (userID, username, password, email, lastLogin) 
    VALUES ('$userID','$username', '$password_hash', '$email', '0')";

    $walletDefaultQuery = "INSERT INTO userWallet(walletID, balance, bitCoinBalance, etheriumBalance, litecoinBalance, bitcoincashBalance, tronBalance)
    VALUES('$userID','100000','0','0','0','0','0')";

    $queryVal = mysqli_query($conn, $insertQuery);
    if ( $queryVal === false ) {
            echo 'error';
    }

    $queryVal2 = mysqli_query($conn, $walletDefaultQuery);
    if ( $queryVal2 === false ) {
            echo 'error';
    }

    return "success";


    }
//to check password against hash do(password_verify($enteredPassword, $myhash);
insertUser('test','test','email@mail.com');
?>
