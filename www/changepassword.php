<?php
  session_start();
    require_once("dbtools.inc.php");
	header("Content-type: text/html; charset=utf-8");
    //取得 modify.php 網頁的表單資料
    $id = $_SESSION["id"];
    $password = $_POST["oldpassword"];
    $setpassword = $_POST["setpassword"];
    $repassword = $_POST["repassword"];
    $sql = "SELECT password FROM tbl_user  WHERE id = $id";;
    $link = create_connection();
    $result = execute_sql("mydatabase", $sql, $link);
    $checkpassword =mysql_result($result, 0, "password");
    //建立資料連接
    if($password==""||$setpassword==""||$repassword==""){
         echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('請輸入密碼')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#editpassword'"; 
    echo "</script>"; 
    }
    else if(strlen($setpassword)<=5){
    echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('密碼設定請超過5個字元')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#editpassword'"; 
    echo "</script>"; 
    }
	else if($checkpassword!=$password||$setpassword!= $repassword){
    echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('確認密碼錯誤，請重新輸入')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#editpassword'"; 
    echo "</script>"; 
    }
    else{
        $sql2="UPDATE tbl_user SET password = '$setpassword' WHERE id = $id";
        $result2 = execute_sql("mydatabase", $sql2, $link);     
    //關閉資料連接
    mysql_close($link);
    echo "<script language='javascript'>"; 
    echo "location.href='logoutsuccess.php'"; 
    echo "</script>"; 
    }
?>