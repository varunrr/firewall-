<?php
  if( $_POST["cm-name"] || $_POST["cm-phkn-phkn"] )
  {
$var1=$_POST["cm-name"];
$var2=$_POST["cm-phkn-phkn"];

   }
$username = "root";
$password = "toor";
$hostname = "localhost"; 
$count=0;
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("community",$dbhandle)
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT email,password FROM cs where email='$var1' AND password='$var2'");

//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
$count=$count+1;
}
if($count>0)
{
header("Location: http://127.0.0.1/community/index1.php");
die();
}
else
{
header("Location: http://127.0.0.1/community/");
die();
}

?>

