<?
require_once("dbtools.inc.php");
header("Content-type: text/html; charset=utf-8");
$title=$_POST["title"];
$content=$_POST["content"];
$class=$_POST["class"];
$time=$_POST["time"];
$date = date ("Y-m-d H:i:s" ,mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ; 
$time2=strtotime("+$time day 8 hours");
$link = create_connection();
$sql="insert into news(title,content,date,class,time)values('$title','$content','$date','$class','$time2')";
$result=execute_sql("mydatabase",$sql,$link);
mysql_close($link);
echo "<SCRIPT language='javascript'>"; 
    echo "window.alert('發布成功')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
    echo "location.href='index.php#news'"; 
    echo "</script>"; 
?>