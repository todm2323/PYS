<?
require_once("dbtools.inc.php");
$uname=$_POST['uname'];
$username=$_POST['username'];
$link = create_connection();
$sql = "UPDATE tbl_user SET uname = '$uname' where username = '$username'";
$result = execute_sql("mydatabase",$sql, $link);
echo "1";
?>