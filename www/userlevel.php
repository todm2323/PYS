<?php
session_start();
require_once("dbtools.inc.php");
$link = create_connection();
$id = $_POST['id'];
$password = $_POST['password'];
$sql = "select * from tbl_user where id = '$id'";
$result = execute_sql("mydatabase",$sql, $link);
//echo $rows;
for($i=1;$i<=mysql_num_rows($result);$i++)
{ $rs=mysql_fetch_assoc($result);
echo $rs["level"];
}
?>