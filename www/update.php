<?php
  session_start();
    require_once("dbtools.inc.php");
	header("Content-type: text/html; charset=utf-8");
    //取得 modify.php 網頁的表單資料
    $id = $_SESSION["id"];
    $uname = $_POST["uname"];
    $cname = $_POST["cname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $cellphone = $_POST["cellphone"];
		
    //建立資料連接
    $link = create_connection();
				
    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE tbl_user SET uname = '$uname', 
            cname = '$cname',  cellphone = '$cellphone', 
            phone = '$phone',address = '$address', email = '$email' WHERE id = $id";
    $result = execute_sql("mydatabase", $sql, $link);
		
    //關閉資料連接
    mysql_close($link);
    echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('修改成功')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#member'"; 
    echo "</script>"; 
?>
