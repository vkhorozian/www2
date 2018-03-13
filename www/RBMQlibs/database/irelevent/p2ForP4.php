<!DOCTYPE html> 
<html lang="en-US">
	<head>
	<meta charset="UTF-8" />
	<title>Project 4</Title>
 
	<style>
table, th, td {
		border: 2px solid black;
   text-align:center;
		        }
          th{
             font-size: 30px;
             }
             
table { 
      border-collapse:collapse;
      width: 60%;
      }
p{ 
      color:red;
      }
tr.brown{
     background-color: #7a7a52;
     height: 85px;
     }
     
tr.tan{
       background-color: #c2c2a3;
       height: 85px;
       }
tr.brown2{
     background-color: #7a7a52;
     height: 32px;
     }
     
tr.tan2{
       background-color: #c2c2a3;
       height: 32px;
       }
	</style>
 

</head>
 
 
<body>



<h1>Project 4</h1>
 

<form action="p2ForP4.php" method="post">

<table>
  <tr>
 	    <th colspan="3">Student Transaction Form</th>
 	</tr>
 
	<tr class="tan">
    <td>Student <br> Name:</td>
    <td><input type="text" name="name1" id="name"></td> 
    <td><p>REQUIRED</p></td>
 	</tr>
 
	<tr class="tan">
    <td>Student <br> Number:</td>
    <td><input type="password" name="password1" id="number"></td> 
    <td><p>REQUIRED</p></td>
 	</tr>
 
	<tr class="brown">
    <td>Student <br> Email:</td>
    <td><input type="text" name="email1" id="email"></td> 
    <td><p>OPTIONAL</p></td>
 	</tr>
 
	<tr class="brown2">
    <td>&nbsp;</td>
    <td colspan="2"><input type="checkbox" name="checkbox1" id="checkbox" value="You will be emailed a confirmation."> email me a transaction comfirmation</td>
 	</tr>

 	
 	
 	<tr class="tan2">
    <td colspan="2">
    Select A Transaction:
    <select name="transactionType" id="ddMenu">
      <option value="registration">Student Registration</option>
      <option value="transcript">Transcript</option>
    </select>
    </td>

    <td><input type="submit" value="Submit Info"></td>
    
 	</tr>
</table>
</br>
<table>
	<tr class="brown">
    <td>Add a Course (Max 4):</td>
    <td>Course name:<input type="text" name="add" id="add"></td> 
    <td><p>OPTIONAL</p></td>
 	</tr>
  
  	<tr class="brown">
    <td>Drop a Course:</td>
    <td>
    Class to drop:
    <select name="drop" id="dropClassMenu">
      <option value="0">DO NOT DROP</option>
      <option value="1">Class 1</option>
      <option value="2">Class 2</option>
      <option value="3">Class 3</option>
      <option value="4">Class 4</option>
    </select>
    </td>
    <td><p>OPTIONAL</p></td>
 	</tr>
  </table>
</form>



<?php

/*config is included in order to protect my login info*/
require('config.php');

/*SQL connection*/
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

/*Checking Connection*/
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

ini_set('display_errors', 1);

if(isset($_POST['name1'], $_POST['password1'], $_POST['email1'])) 
{
  $enteredName1 = $_POST['name1'];
  $enteredPassword1 = $_POST['password1'];
  $enteredEmail1 = $_POST['email1'];
  $splitName = explode(" ", $enteredName1);
  $transaction = $_POST['transactionType'];
  $addedClass = $_POST['add'];
  $droppedClass = $_POST['drop'];
echo "</br>";
echo $splitName[0]; // piece1
echo "</br>";
echo $splitName[1]; // piece2
echo "</br>";
echo $addedClass;
echo "</br>";

$sql = "SELECT * FROM studentInfo HAVING First =  '$splitName[0]' && Last = '$splitName[1]' && ID ='$enteredPassword1'";
$data1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$num_rows = $data1->num_rows;
echo "<h1>" . "Current Schedule (Before add or drop)." . "</h1>";
$class1;
$class2;
$class3;
$class4;

if($num_rows == 0)
{
  $message1 = "Login Not Correct";
  echo "<script type='text/javascript'>alert('$message1');</script>"; 
}

else
{
  if($transaction == "registration")
  { 
    $message4 = "Displaying Student Registration";
    echo "<script type='text/javascript'>alert('$message4');</script>"; 
    
    echo "<table border = 1 style='float:left'>
    <tr>
  	<th>First Name</th>
  	<th>Last Name</th>
	  <th>Student ID</th>
  	<th>Student Email</th>
  	<th>Class 1</th>
  	<th>Class 2</th>
  	<th>Class 3</th>
  	<th>Class 4</th>
    </tr>";
    while($records = mysqli_fetch_array($data1))
    {
      echo "<tr>";
      echo "<td>" . $records["First"] . "</td>";
           $first1 = $records["First"];
      echo "<td>" . $records["Last"] . "</td>";
           $last1 = $records["Last"];
      echo "<td>" . $records["ID"] . "</td>";
           $id1 = $records["ID"];
      echo "<td>" . $records["Email"] . "</td>";
           $email1 = $records["Email"];
      echo "<td>" . $records["Course1"] . "</td>";
        $class1 = $records["Course1"];
      echo "<td>" . $records["Course2"] . "</td>";
        $class2 = $records["Course2"];
      echo "<td>" . $records["Course3"] . "</td>";
        $class3 = $records["Course3"];
      echo "<td>" . $records["Course4"] . "</td>";
        $class4 = $records["Course4"];
      echo "</tr>";
      echo "<br />";
    }
        

//Call Add
$changesBoolean1 = 0;
  if($addedClass =="")
  {
    //Not adding class
  }
  else
  {
    addClass($addedClass,$splitName[0],$splitName[1],$class1,$class2,$class3,$class4,$conn);
    $changesBoolean1 = 1;
  }


//Call Drop
  if($droppedClass > 0)
  {
    dropClass($droppedClass,$splitName[0],$splitName[1],$class1,$class2,$class3,$class4,$conn);
    $changesBoolean1 = 1;
  }
  else
  {
  }
//AFTER CHANGES MADE
$data2 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if($changesBoolean1 == 1)
  {
  echo "<h1>" . "Current Schedule (After add or drop)." . "</h1>";
   echo "<table border = 1 style='float:left'>
    <tr>
  	<th>First Name</th>
  	<th>Last Name</th>
	  <th>Student ID</th>
  	<th>Student Email</th>
  	<th>Class 1</th>
  	<th>Class 2</th>
  	<th>Class 3</th>
  	<th>Class 4</th>
    </tr>";
    while($records1 = mysqli_fetch_array($data2))
    {
      echo "<tr>";
      echo "<td>" . $records1["First"] . "</td>";
           $first1 = $records1["First"];
      echo "<td>" . $records1["Last"] . "</td>";
           $last1 = $records1["Last"];
      echo "<td>" . $records1["ID"] . "</td>";
           $id1 = $records1["ID"];
      echo "<td>" . $records1["Email"] . "</td>";
           $email1 = $records1["Email"];
      echo "<td>" . $records1["Course1"] . "</td>";
        $class1 = $records1["Course1"];
      echo "<td>" . $records1["Course2"] . "</td>";
        $class2 = $records1["Course2"];
      echo "<td>" . $records1["Course3"] . "</td>";
        $class3 = $records1["Course3"];
      echo "<td>" . $records1["Course4"] . "</td>";
        $class4 = $records1["Course4"];
      echo "</tr>";
      echo "<br />";
    }
    $changesBoolean1 = 0;
  }
}
  elseif($transaction == "transcript")
  {
  $message1 = "Displaying Student Transcription";
  echo "<script type='text/javascript'>alert('$message1');</script>"; 
  
  echo "<table border = 1 style='float:left'>
  <tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Student ID</th>
	<th>Student Email</th>
	<th>Class 1</th>
	<th>Class 2</th>
	<th>Class 3</th>
	<th>Class 4</th>
	<th>Trancript 1</th>
	<th>Grade 1</th>
	<th>Trancript 2</th>
	<th>Grade 2</th>
	<th>Trancript 3</th>
	<th>Grade 3</th>
	<th>Trancript 4</th>
	<th>Grade 4</th>
	<th>Trancript 5</th>
	<th>Grade 5</th>
	<th>Trancript 6</th>
	<th>Grade 6</th>
	<th>Trancript 7</th>
	<th>Grade 7</th>
	<th>Transcript 8</th>
	<th>Grade 8</th>
  </tr>";
  while($records = mysqli_fetch_array($data1))
  {
    echo "<tr>";
    echo "<td>" . $records["First"] . "</td>";
    echo "<td>" . $records["Last"] . "</td>";
    echo "<td>" . $records["ID"] . "</td>";
    echo "<td>" . $records["Email"] . "</td>";
    echo "<td>" . $records["Course1"] . "</td>";
            $class1 = $records["Course1"];
    echo "<td>" . $records["Course2"] . "</td>";
            $class2 = $records["Course2"];
    echo "<td>" . $records["Course3"] . "</td>";
            $class3 = $records["Course3"];
    echo "<td>" . $records["Course4"] . "</td>";
            $class4 = $records["Course4"];
    echo "<td>" . $records["Transcript1"] . "</td>";
    echo "<td>" . $records["Grade1"] . "</td>";
    echo "<td>" . $records["Transcript2"] . "</td>";
    echo "<td>" . $records["Grade2"] . "</td>";
    echo "<td>" . $records["Transcript3"] . "</td>";
    echo "<td>" . $records["Grade3"] . "</td>";
    echo "<td>" . $records["Transcript4"] . "</td>";
    echo "<td>" . $records["Grade4"] . "</td>";
    echo "<td>" . $records["Transcript5"] . "</td>";
    echo "<td>" . $records["Grade5"] . "</td>";
    echo "<td>" . $records["Transcript6"] . "</td>";
    echo "<td>" . $records["Grade6"] .  "</td>";
    echo "<td>" . $records["Transcript7"] . "</td>";
    echo "<td>" . $records["Grade7"] . "</td>";
    echo "<td>" . $records["Transcript8"] . "</td>";
    echo "<td>" . $records["Grade8"] . "</td>";
    echo "</tr>";
    echo "<br />";
  }
    echo "</table>";
    $changesBoolean;
//Call Add
  if($addedClass =="")
  {
    //Not adding class
  }
  else
  {
    addClass($addedClass,$splitName[0],$splitName[1],$class1,$class2,$class3,$class4,$conn);
        $changesBoolean = 1;
  }
  //Call Drop
  if($droppedClass > 0)
  {
    dropClass($droppedClass,$splitName[0],$splitName[1],$class1,$class2,$class3,$class4,$conn);
    $changesBoolean = 1;
  }
  else
  {
  }
  
  //AFTER CHANGES MADE
  $data3 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  if($changesBoolean == 1)
  {
  echo "<h1>" . "Current Schedule (After add or drop)." . "</h1>";
  echo "<table border = 1 style='float:left'>
  <tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Student ID</th>
	<th>Student Email</th>
	<th>Class 1</th>
	<th>Class 2</th>
	<th>Class 3</th>
	<th>Class 4</th>
	<th>Trancript 1</th>
	<th>Grade 1</th>
	<th>Trancript 2</th>
	<th>Grade 2</th>
	<th>Trancript 3</th>
	<th>Grade 3</th>
	<th>Trancript 4</th>
	<th>Grade 4</th>
	<th>Trancript 5</th>
	<th>Grade 5</th>
	<th>Trancript 6</th>
	<th>Grade 6</th>
	<th>Trancript 7</th>
	<th>Grade 7</th>
	<th>Transcript 8</th>
	<th>Grade 8</th>
  </tr>";
  while($records2 = mysqli_fetch_array($data3))
  {
    echo "<tr>";
    echo "<td>" . $records2["First"] . "</td>";
    echo "<td>" . $records2["Last"] . "</td>";
    echo "<td>" . $records2["ID"] . "</td>";
    echo "<td>" . $records2["Email"] . "</td>";
    echo "<td>" . $records2["Course1"] . "</td>";
    echo "<td>" . $records2["Course2"] . "</td>";
    echo "<td>" . $records2["Course3"] . "</td>";
    echo "<td>" . $records2["Course4"] . "</td>";
    echo "<td>" . $records2["Transcript1"] . "</td>";
    echo "<td>" . $records2["Grade1"] . "</td>";
    echo "<td>" . $records2["Transcript2"] . "</td>";
    echo "<td>" . $records2["Grade2"] . "</td>";
    echo "<td>" . $records2["Transcript3"] . "</td>";
    echo "<td>" . $records2["Grade3"] . "</td>";
    echo "<td>" . $records2["Transcript4"] . "</td>";
    echo "<td>" . $records2["Grade4"] . "</td>";
    echo "<td>" . $records2["Transcript5"] . "</td>";
    echo "<td>" . $records2["Grade5"] . "</td>";
    echo "<td>" . $records2["Transcript6"] . "</td>";
    echo "<td>" . $records2["Grade6"] .  "</td>";
    echo "<td>" . $records2["Transcript7"] . "</td>";
    echo "<td>" . $records2["Grade7"] . "</td>";
    echo "<td>" . $records2["Transcript8"] . "</td>";
    echo "<td>" . $records2["Grade8"] . "</td>";
    echo "</tr>";
    echo "<br />";
  }
    echo "</table>";
  }
    $changesBoolean1 = 0;

  }
}

}

function addClass($courseName,$firstN,$lastN,$course1,$course2,$course3,$course4,$conn)
{
echo $courseName . $firstN . $lastN . $course1 . $course2 . $course3 . $course4;
  if($course1 =="")
  {
 $sql2= "UPDATE studentInfo SET Course1= '$courseName' WHERE First ='$firstN' && Last ='$lastN'";
    
    if (mysqli_query($conn, $sql2))
    {
    echo "New record created successfully";
    }
    else 
    {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }
    
  }
  elseif($course2 =="")
  {
  
    $sql3= "UPDATE studentInfo SET Course2= '$courseName' WHERE First ='$firstN' && Last ='$lastN'";
    if (mysqli_query($conn, $sql3))
    {
    echo "New record created successfully";
    }
    else 
    {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
    
  }
  elseif($course3 =="")
  {
  
    $sql4= "UPDATE studentInfo SET Course3= '$courseName' WHERE First ='$firstN' && Last ='$lastN'";
     if (mysqli_query($conn, $sql4))
    {
    echo "New record created successfully";
    }
    else 
    {
    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
    }
    
  }
  elseif($course4 =="")
  {

    $sql5= "UPDATE studentInfo SET Course4= '$courseName' WHERE First ='$firstN' && Last ='$lastN'";
     if (mysqli_query($conn, $sql5))
    {
    echo "New record created successfully";
    }
    else 
    {
    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
    }

  }
  
  else
  {
  //Cannot Add
   $messageadd = "Cannot add, maximum of 4 classes.";
  echo "<script type='text/javascript'>alert('$messageadd');</script>"; 
  }
  return 0;
}


function dropClass($classNumber,$firstN,$lastN,$course1,$course2,$course3,$course4,$conn)
{
  if($classNumber == 0)
  {
  //Do Not Drop
  }
  elseif($classNumber == 1)
  {
  $sql6 = "UPDATE studentInfo SET Course1= '' WHERE First ='$firstN' && Last ='$lastN'";
  if (mysqli_query($conn, $sql6))
    {
    echo "Record successfully removed";
    }
    else 
    {
    echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
    }
  }
  
  elseif($classNumber == 2)
  {
  $sql7 = "UPDATE studentInfo SET Course2= '' WHERE First ='$firstN' && Last ='$lastN'";
    if (mysqli_query($conn, $sql7))
    {
    echo "Record successfully removed";
    }
    else 
    {
    echo "Error: " . $sql7 . "<br>" . mysqli_error($conn);
    }
  }
  
  elseif($classNumber == 3)
  {
  $sql8 = "UPDATE studentInfo SET Course3= '' WHERE First ='$firstN' && Last ='$lastN'";
    if (mysqli_query($conn, $sql8))
    {
    echo "Record successfully removed";
    }
    else 
    {
    echo "Error: " . $sql8 . "<br>" . mysqli_error($conn);
    }
  }
  elseif($classNumber == 4)
  {
  $sql9 = "UPDATE studentInfo SET Course4= '' WHERE First ='$firstN' && Last ='$lastN'";
    if (mysqli_query($conn, $sql9))
    {
    echo "Record successfully removed";
    }
    else 
    {
    echo "Error: " . $sql9 . "<br>" . mysqli_error($conn);
    }
  }
  else
  {
  //Do Not Drop
  }







}


?>

 </body>
</html>