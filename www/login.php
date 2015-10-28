<?
session_start();
  require_once("dbtools.inc.php");
  header("Content-type: text/html; charset=utf-8");
	
  //取得表單資料
  $username = $_POST["username"]; 	
  $password = $_POST["password"];

  //建立資料連接
  $link = create_connection();
  //$link = mysql_connect("localhost", "root", "0000");			
  //檢查帳號密碼是否正確
  $sql = "SELECT * FROM tbl_user Where username = '$username' AND password = '$password'";
  $result = execute_sql("mydatabase", $sql, $link);
  
  if (mysql_num_rows($result) == 0)
  {
    //釋放 $result 佔用的記憶體
    mysql_free_result($result);
	
    //關閉資料連接	
    mysql_close($link);		
		echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('帳號或密碼錯誤')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#member'"; 
    echo "</script>"; 
	
  }
  else
  {  
  $id = mysql_result($result, 0, "id");
  $level = mysql_result($result, 0, "level");
  setcookie("id",$id); 
  $_SESSION["id"]=$id;
  $_SESSION["level"]=$level;
  setcookie("passed", "TRUE");  
  header("location:index.php");
  }
?>