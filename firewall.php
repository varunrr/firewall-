<?php
//use strip(value); to existing parameters
header("request-filtered-by: stefan2200-waf");
header("X-Frame-Options: SAMEORIGIN");

foreach ($_POST as $param_name => $param_val) {
    check($param_name, $param_val, "POST");
}
foreach ($_GET as $param_name => $param_val) {
    check($param_name, $param_val, "GET");
}
foreach ($_COOKIE as $param_name => $param_val) {
    check($param_name, $param_val, "COOKIE");
}
function strip($value){
 check("CUSTOM", $value, "HEADER");
}


function check($name, $value, $method){ //easy to add
 $var = trim($value);
 $var = addslashes($var);
  $tmpvar = strtolower($var);

 $count=0;


$username = "root";
$password = "toor";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");


//select a database to work with
$selected = mysql_select_db("rules",$dbhandle)
  or die("Could not select examples");

//execute the SQL query and return records
$result = mysql_query("SELECT customrule FROM firewall");

//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
if(strcmp(($row{'customrule'}),($param_val))==0)
$count=$count+1;
$a=$row{'customrule'};
$demo=$name.$value.$method;


  
}
//close the connection
mysql_close($dbhandle);


if (strpos($demo,$a)==false){
   $var = stripslashes($var);
  }else{
header("Location: http://127.0.0.1/community/custom");
die();
  $var = NULL;
  }

  if (strpos($tmpvar, "'") == false && strpos($tmpvar, "*") == false && strpos($tmpvar, "--") == false){
   $var = stripslashes($var);
  }else{
header("Location: http://127.0.0.1/community/sql");
die();
  $var = NULL;
  }


  if (strpos($tmpvar, "<script>") == false && strpos($tmpvar, "\"") == false && strpos($tmpvar, "prompt(") == false && strpos($tmpvar, "alert(") == false){
   $var = stripslashes($var);
  }else{
header("Location: http://127.0.0.1/community/xss");
die();
  $var = NULL;
  }
  if (strpos($tmpvar, "/./") == false && strpos($tmpvar, "etc/passwd") == false && strpos($tmpvar, "/..") == false && strpos($tmpvar, "/../") == false){
   $var = stripslashes($var);
  }else{
header("Location: http://127.0.0.1/community/path");
die();
  $var = NULL;
  }

}

//echo $count;


?>
