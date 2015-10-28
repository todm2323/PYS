<?
require_once("dbtools.inc.php");
$uname=$_POST['uname'];
$cname=$_POST['cname'];
$phone=$_POST['phone'];
$cellphone=$_POST['cellphone'];
$email=$_POST['email'];
$address=$_POST['address'];
$id=$_POST['id'];
$link = create_connection();
$sql = "UPDATE tbl_user SET uname = '$uname',cname= '$cname', phone='$phone', cellphone='$cellphone', email='$email', address='$address' where id = '$id'";
$result = execute_sql("mydatabase",$sql, $link);
echo "1";
?>