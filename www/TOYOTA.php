<?php
   session_start();
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE{"passed"};
    
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  if ($passed != "TRUE")
  {
    header("location:login.html");
    exit();
  }
mysql_connect("localhost","root","0000");//與localhost連線、root是帳號、密碼處輸入自己設定的密碼
mysql_select_db("mydatabase");//我要從member這個資料庫撈資料
$data=mysql_query("select * from product where brand='TOYOTA'");//從member中選取全部(*)require_once("dbtools.inc.php");
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script src="back.js"></script>
<style type="text/css">
  .ui-li-thumb, .ui-li-icon {
    left: 3px;
    max-height: 100px; 
    max-width: 100px;
    position: center;
    top: 25px;
}
  </style>
</head>
<body>
        <div data-role="header" data-add-back-btn="true" data-back-btn-text="回上一頁" data-position="fixed">
                <h1>TOYOTA</h1>
            </div>
    <div data-role="collapsible" data-collapsed="false" data-theme="e">
    <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                                <li data-role="list-divider">TOYOTA</li>
<?php
for($i=1;$i<=mysql_num_rows($data);$i++)
{ $rs=mysql_fetch_assoc($data);
?>

                                <li>
                                    <a href="#">
                                        <img class="ui-li-thumb" src="<?php echo $rs["picture"]?>"/>
                                        <h1>產品名稱:<?php echo $rs["productname"]?></h1>
                                        <p>重量:<?php echo $rs["weigh"]?></p>
                                        <p>揚高:<?php echo $rs["mast"]?></p>
                                        <p>編號:<?php echo $rs["number"]?></p>
                                        <p>年分:<?php echo $rs["year"]?></p>
                                        <p>狀態:<?php echo $rs["state"]?></p>
                                        <span class="ui-li-count">加入詢價單</span>
                                    </a >
                                </li>
                            

<?php }?>
</ul>
</div>
<div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="list.php" data-icon="home">回首頁</a></li>
                        <li><a href="#" data-icon="search">詢價單</a></li>
                    </ul>
                </div>
            </div>
</body>
</html>

