<?
require_once("dbtools.inc.php");
$username=$_POST['username'];
$password=$_POST['password'];
$link = create_connection();
//$sql = "SELECT * FROM tbl_user Where username = '$username' or email='$email'";
//$result = execute_sql("mydatabase",$sql, $link);
//if (mysql_num_rows($result) != 0)
  //{
    //釋放 $result 佔用的記憶體
    //顯示訊息要求使用者更換帳號名稱
   // echo "1";
  //}
  //else{ 
  
	  $sql="insert into tbl_user(username,password)values('{$username}','{$password}')";
	  $result = execute_sql("mydatabase", $sql, $link);
	  if (mysql_num_rows($result) != 0){
		  echo "User Found"; 
	  }
	  else  {
	echo "User Found222"; 
}
//mysql_query("insert into tbl_user(username,password,uname,cname,phone,cellphone,email,address)values('{$username}','{$password}','{$uname}','{$cname}','{$phone}','{$cellphone}','{$email}','{$address}')");
//mysql_close();
//}
?>