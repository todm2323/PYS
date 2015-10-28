<?
require_once("dbtools.inc.php");
$date=$_POST['date'];
$cname=$_POST['cname'];
$uname=$_POST['uname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$pid=$_POST['pid'];
$content=$_POST['content'];
$fixdate=$_POST['fixdate'];
$fixuname=$_POST['fixuname'];
$state=$_POST['state'];
$id=$_POST['id'];
$link = create_connection();
$sql = "UPDATE maintain SET date = '$date',uname = '$uname',cname= '$cname', phone='$phone',address='$address',pid='$pid',content='$content',fixdate='$fixdate',fixuname='$fixuname',state='$state' where id = '$id'";
$result = execute_sql("mydatabase",$sql, $link);
print "1";
?>