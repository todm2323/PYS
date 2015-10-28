<?
require_once("dbtools.inc.php");
$title=$_POST['title'];
$content=$_POST['content'];
$date = date ("Y-m-d H:i:s" ,mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ; 
$link = create_connection();
$sql="insert into news(title,content,date)values('$title','$content','$date')";
$result = execute_sql("mydatabase",$sql, $link);
if (mysql_num_rows($result) != 0)
  {   
      mysql_free_result($result);
	  print "1";
  }
  else{
	  print "0";
	  }
?>