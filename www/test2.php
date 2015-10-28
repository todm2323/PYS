<?php
   
session_start();

header("Content-Type:text/html; charset=utf-8");

   $link = mysql_connect("localhost", "root", "0000")
    or die("Cannot connect database");

    mysql_query("SET NAMES 'utf8'");

  $dbName = "fyp";   
  if (!mysql_select_db($dbName,$link)) {  
      die("Cannot select database");  }  
$query = "SELECT Password FROM user WHERE Username ='$_POST[Username2]'";
$result = mysql_query($query, $link)
         or die("Data not found");

if ($row = mysql_fetch_array($result)) {
   
if ($row[Password] == $_POST[Password2]){

echo "Login Succeeded";

}else{

	echo"Login Failed";
}

}

else{

	echo "Please enter your username and password";
}
    

?>