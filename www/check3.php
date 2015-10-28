<?
require_once("dbtools.inc.php");
$username=$_POST['username'];
$password=$_POST['password'];
$uname=$_POST['uname'];
$cname=$_POST['cname'];
$phone=$_POST['cphone'];
$cellphone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$link = create_connection();
$sql = "SELECT * FROM tbl_user Where username = '$username' or email='$email'";
$result = execute_sql("mydatabase",$sql, $link);
if (mysql_num_rows($result) != 0)
  {
	  mysql_free_result($result);
    //釋放 $result 佔用的記憶體
    //顯示訊息要求使用者更換帳號名稱
    echo "1";
  }
  else{ 
  if(strlen($password)<6){
	  mysql_free_result($result);
	  echo "2";
  }
  else{
	   mysql_free_result($result);
	function getRandNewstate()
  {
    $state_len = 6;//指定隨機密碼字串字數
    $state = '';
	//指定隨機密碼字串內容
    $word = 'abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $len = strlen($word);
    for ($i = 0; $i < $state_len; $i++) {
        $state .= $word[rand() % $len];
    }
    return $state;
  }
  $state=getRandNewstate();
  
	  $sql="insert into tbl_user(username,password,uname,cname,phone,cellphone,email,address,state)values('{$username}','{$password}','{$uname}','{$cname}','{$phone}','{$cellphone}','{$email}','{$address}','{$state}')";
  $result = execute_sql("mydatabase", $sql, $link);
  }
//mysql_query("insert into tbl_user(username,password,uname,cname,phone,cellphone,email,address)values('{$username}','{$password}','{$uname}','{$cname}','{$phone}','{$cellphone}','{$email}','{$address}')");
//mysql_close();
}
?>