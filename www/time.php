 <?
 $t=strtotime(date ("Y-m-d H:i:s" ,mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))));
 echo $t;
 ?>