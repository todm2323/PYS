<?php
session_start();
require_once("dbtools.inc.php");
$link = create_connection();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from tbl_user where username = '".$username."' AND password = '".$password. "'";
$result = execute_sql("mydatabase",$sql, $link);
//echo $rows;
if(mysql_num_rows($result) != 0){
	$id = mysql_result($result,0, "id");
	mysql_free_result($result);
	print $id; 
	}
 else{
	 mysql_free_result($result);
    //關閉資料連接					
    //將使用者資料加入 cookies
	print "abc"; 
}
?>
