<?
require_once("dbtools.inc.php");
$date=$_POST['date'];
$cname=$_POST['cname'];
$uname=$_POST['uname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$pid=$_POST['pid'];
$content=$_POST['content'];
$uid=$_POST['uid'];
$link = create_connection();
$sql="insert into maintain(date,cname,uname,phone,address,pid,content,uid)values('{$date}','{$cname}','{$uname}','{$phone}','{$address}','{$pid}','{$content}','{$uid}')";
$result = execute_sql("mydatabase",$sql, $link);
print "1";
?>