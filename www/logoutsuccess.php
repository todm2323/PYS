<?php
session_start();
header("Content-type: text/html; charset=utf-8");
unset($_SESSION['id']);
unset($_SESSION['level']);
setcookie("passed", "false");
	echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('請重新登入')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php'"; 
    echo "</script>"; 
?>