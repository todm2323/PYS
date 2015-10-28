<?
   session_start();
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE{"passed"};
  $id = $_SESSION["id"];
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  /*if ($passed != "TRUE")
  {
    header("location:login.html");
    exit();
  }*/
   require_once("dbtools.inc.php");
   $link = create_connection();
   $sql = "SELECT * FROM tbl_user Where id = '$id'";
   $result = execute_sql("mydatabase", $sql, $link);
   $row = mysql_fetch_assoc($result);
   $datatoyota=mysql_query("select * from product where brand='TOYOTA'");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
$(document).bind('mobileinit', function(){
  $.mobile.ajaxEnabled=false;
});
</script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<script src="js/jquery.touchwipe.1.1.1.js"></script>
<script src="back.js"></script>
<script>
$(function(){
    $('#imagegallery').cycle({
        timeout: 0,
        fx: 'scrollHorz',
        next: '#next',
        prev: '#prev' 
    });
 
    $("#imagegallery").touchwipe({
        wipeLeft: function() {
            $("#imagegallery").cycle("next");
 
        },
        wipeRight: function() {
            $("#imagegallery").cycle("prev");           
        }
    });
})
 
</script>
<style>
.ui-li-thumb2, .ui-li-icon {
    left: 3px;
    max-height: 100px; 
    max-width: 90px;
    position: center;
    top: 25px;
}
body {
    margin:0;
    padding:0;
    background:#ccc;
}
#wrap {
    position:relative;
    width:60%;
    height:30%;
    margin:0 auto;
    overflow:hidden;
}
#imagegallery {
    width:60%;
    height:30%;
    background:#fff;
    margin:0 auto;
    margin-top:10px;
    overflow:hidden;
    text-align:center;
}
#imagegallery a {
    text-decoration:none;
    color:#333333;
}
#nav {
    width:100%;
    height:100%;
    position:absolute;
    top:75px;
    z-index:100;
}
#nav a {
    display:block;
    line-height:200%;
    width:15%;
    background:rgba(0,0,0,0.4);
    text-align:center;
    text-decoration:none;
    font-size:21px;
    color:#fff;
    font-family:Arial, Helvetica, sans-serif;
    border-radius: 17px;
}
#prev {
    float:left;
    margin-left:-15px;
}
#next {
    float:right;
    margin-right:-15px;
}

.ui-grid-b img {
    width  : 100%;
    height : auto;
}
</style>
</head>
<body>
      <div data-role="page" id="home">
<div data-role="header" data-theme="e" style="text-align:center;">
                <img src="PYS/PYS.PNG" />
            </div>

  <div data-role="main" class="ui-content">

   <div class="ui-grid-b">
    
    <div class="ui-block-a">
      <div> <a style="text-decoration:none" href="#">
        <img src="PYS/Calendar.png" />
        <p style="text-align:center;">最新消息</p>
        </a>
        </div>
    </div>
    <div class="ui-block-b">
      <div> <a style="text-decoration:none" href="#product">
        <img src="PYS/product.png" />
        <p style="text-align:center;">產品介紹</p>
        </a>
        </div>
    </div>
    <?if($passed=="TRUE"){?>
    <div class="ui-block-c">
         <div> <a style="text-decoration:none" href="#">
        <img alt="alt..." src="PYS/order.png" />
         <p style="text-align:center;">詢價單</p>
        </a>
        </div>
    </div>
  <?}?>
<?if($passed=="TRUE"){?>
    <div class="ui-block-a">
        <div> <a style="text-decoration:none" href="#">
        <img alt="alt..." src="PYS/fix.png" />
        <p style="text-align:center;">預約維修</p>
        </a>
        </div>
    </div>
    <div class="ui-block-b">
        <div> <a style="text-decoration:none" href="#">
        <img alt="alt..." src="PYS/List.png" />
         <p style="text-align:center;">維修紀錄</p>
      </a>
        </div>
    </div>
    <?}?>
    <div class="ui-block-c">
        <div> <a style="text-decoration:none" href="#member">
        <img alt="alt..." src="PYS/User.png" />
         <p style="text-align:center;">會員資料</p>
        </a>
        </div>
    </div>
</div>
  </div>
</div> 
     <div data-role="page" id="product" data-fullscreen="false" data-add-back-btn="true" data-back-btn-text="回上一頁" >
                        <div data-role="header" data-position="fixed">
                <h5>PYS</h5>
            </div>
                          <div data-role="collapsible" data-collapsed="false" data-theme="e">
                            <h2>產品介紹</h2>
                            <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                                <li data-role="list-divider">堆高機</li>
                                <li>
                                    <a href="#toyota">
                                        <img src="PYS/TOYOTA.jpg" />
                                        <h3>TOYOTA</h3>                           
                                    </a>
                                </li>
                                <li>
                                    <a href="http://tw.meetgee.com/Topic/List.aspx?GameID=589">
                                        <img src="PYS/NYK.jpg" />
                                        <h3>NYK</h3>
                                       
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.8591.com.tw/wareList-sellList-859.html">
                                        <img src="PYS/TCM.jpg" />
                                        <h3>TCM</h3>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="http://zh.wikipedia.org/zh-tw/%E6%96%B0%E6%A5%93%E4%B9%8B%E8%B0%B7">
                                        <img src="PYS/KOMATSU.jpg" />
                                        <h3>KOMATSU</h3>
                                        
                                    </a>
                                </li>
                            </br>
                                <li data-role="list-divider">零件</li>
                                <li>
                                    <a href="http://zh.wikipedia.org/zh-tw/%E6%96%B0%E6%A5%93%E4%B9%8B%E8%B0%B7">
                                        <img src="PYS/輪胎.jpg" />
                                        <h3>輪胎</h3>
                                        
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home">回首頁</a></li>
                        <li><a href="#product" data-icon="gear">產品介紹</a></li>
                        <li><a href="#" data-icon="search">詢價單</a></li>
                        <li><a href="#" data-icon="grid">預約維修</a></li>
                        <li><a href="#member" data-icon="edit">會員資料</a></li>
                    </ul>
                </div>
            </div>
             </div>
             <div data-role="page" id="member" data-add-back-btn="true" data-back-btn-text="回上一頁">
            <div data-role="header" data-position="fixed">
                <h1>會員資料</h1>
            </div>
            <div data-role="content" align="center">
              <?if($passed=="TRUE"){?>
                <div data-role="fieldcontain">
              <p type="text" name="username" id="username" ><?php echo $row["username"]?>  您好</p>
              </div>
             <div data-role="fieldcontain">
             <label for="uname">姓名</label>
             <input type="text" name="uname" id="uname"  value="<?php echo $row{"uname"} ?>" />
              </div>
              <div data-role="fieldcontain">
              <label for="cname">公司名稱</label>
            <input type="text" name="cname" id="cname"  value="<?php echo $row{"cname"} ?>" />
             </div>
            <div data-role="fieldcontain">
            <label for="address">地址</label>
            <input type="text" name="address" id="address" value="<?php echo $row{"address"} ?>" />
            </div>
          <div data-role="fieldcontain">
          <label for="phone">公司電話</label>
            <input type="text" name="phone" id="phone"  value="<?php echo $row{"phone"} ?>"/>
        </div>
          <div data-role="fieldcontain">
         <label for="cellphone">手機</label>
        <input type="text" name="cellphone" id="cellphone" value="<?php echo $row{"cellphone"} ?>" />
         </div>
          <div data-role="fieldcontain">
            <label for="email">E-mail</label>
                  <input type="text" name="email" id="email"  value="<?php echo $row{"email"} ?>"/>
               </div>
                <button type="button" data-theme="a" onclick="location.href='#'">修改資料</button>
                <button type="button" data-theme="c" onclick="location.href='#'">修改密碼</button>
                <button type="button" data-theme="b" onclick="location.href='logoutsuccess.php'">登出</button>
                <?}else{?>
                <form name="vote" action="login.php" method="post" data-ajax="false">


<div data-role="content">
<div data-role="fieldcontain">
<label for="inp_tw10">帳號</label>
<input type="text" name="username" id="inp_tw10" />
</div>
<div data-role="fieldcontain">
<label for="inp_tw11">密碼</label>
<input type="password" name="password" id="inp_tw11" />
</div>
<input id="login" type="submit" data-theme="b" value="登入" />
</div>


</form>
                <?}?>

            </div>
            <div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home">回首頁</a></li>
                        <li><a href="#product" data-icon="gear" >產品介紹</a></li>
                        <li><a href="#" data-icon="search">詢價單</a></li>
                        <li><a href="#" data-icon="grid">預約維修</a></li>
                        <li><a href="#member" data-icon="edit">會員資料</a></li>
                    </ul>
                </div>
             
            </div>
        </div>
         <div data-role="page" id="toyota" data-add-back-btn="true" data-back-btn-text="回上一頁">
            <div data-role="header" data-add-back-btn="true" data-back-btn-text="回上一頁" data-position="fixed">
                <h1>TOYOTA</h1>
            </div>
    <div data-role="collapsible" data-collapsed="false" data-theme="e">
    <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                                <li data-role="list-divider">TOYOTA</li>
<?php
for($i=1;$i<=mysql_num_rows($datatoyota);$i++)
{ $rs=mysql_fetch_assoc($datatoyota);
?>

                                <li>
                                    <a href="#">
                                        <img class="ui-li-thumb2" src="<?php echo $rs["picture"]?>"/>
                                        <h1><?php echo $rs["productname"]?></h1>
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
                        <li><a href="#home" data-icon="home">回首頁</a></li>
                        <li><a href="#" data-icon="search">詢價單</a></li>
                    </ul>
                </div>
            </div>
            </div>


                        </body>

</html>
