<?php
  if( $_POST["cm-name"]  )
  {
$var1=$_POST["cm-name"];


   }
$username = "root";
$password = "toor";
$hostname = "localhost"; 
$count=0;
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("rules",$dbhandle)
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("insert into firewall values ('$var1')");


header("Location: http://127.0.0.1/community/success.php");
die();



?>

