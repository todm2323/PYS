<?
$con = mysql_connect('localhost','root','0000');
mysql_select_db("newdatabase",$con);
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
mysql_query("insert into newtable(name,age,email)values('{$name}','{$age}','{$email}')");
//mysql_close();
?>