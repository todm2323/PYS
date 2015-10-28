<?php
  function create_connection()
  {
    $link = mysql_connect("localhost", "root", "0000")
      or die("無法建立資料連接<br><br>" . mysql_error()); 
    return $link;
  }
	
  function execute_sql($database, $sql, $link)
  {
   mysql_query("SET NAMES 'UTF8'");
    $db_selected = mysql_select_db($database, $link)
      or die("開啟資料庫失敗<br><br>" . mysql_error($link));		 
    $result = mysql_query($sql, $link);
    return $result;
  }
?>