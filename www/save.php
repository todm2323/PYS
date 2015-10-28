<?
$server = "localhost";
$username = "root";
$password = "0000";
$database = "test";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);
if(isset($_POST['signup']))
{
$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
$commend=mysql_real_escape_string(htmlspecialchars(trim($_POST['commend'])));
$login=mysql_num_rows(mysql_query("select * from user where `email`='$email'",$con));
if($login!=0)
{
echo "exist";
}
else
{
$date=date("d-m-y h:i:s");
$q=mysql_query("insert into `phonegap_login` (`reg_date`,`fullname`,`email`,`password`) values ('$date','$fullname','$email','$password')");
if($q)
{
echo "success";
}
else
{
echo "failed";
}
}
echo mysql_error();
}
?>