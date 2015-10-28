<?
   session_start();
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE{"passed"};
  $id = $_SESSION["id"];
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  /*if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }*/
   require_once("dbtools.inc.php");
   $link = create_connection();
   $sql = "SELECT * FROM tbl_user Where id = '$id'";
   $result = execute_sql("mydatabase", $sql, $link);
   $row = mysql_fetch_assoc($result);
   $datatoyota=mysql_query("select * from product where brand='TOYOTA'");
   $datanews=mysql_query("select * from news where class='新聞' ORDER BY date DESC");
   $datanewsa=mysql_query("select * from news where class='活動' ORDER BY date DESC");
   $datacompany=mysql_query("select * from tbl_user");
   $t=strtotime(date ("Y-m-d H:i:s" ,mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))));
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
var clicks = 0;
    function onClick() {
        clicks += 1;
        document.getElementById("clicks").innerHTML = clicks;
        document.getElementById("clicks1").innerHTML = clicks;
        document.getElementById("clicks2").innerHTML = clicks;
    };

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
#map-page, #map-canvas { width: 200px; height: 200px; padding: 0; }
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
      <div class="ui-bar-c"> <a style="text-decoration:none" href="#news" data-transition="slide">
        <img src="PYS/Calendar.png" />
        <p style="text-align:center;">最新消息</p>
        </a>
        </div>
    </div>
    <div class="ui-block-b">
      <div class="ui-bar-c"> <a style="text-decoration:none" href="#product" data-transition="slide">
        <img src="PYS/product.png" />
        <p style="text-align:center;">產品介紹</p>
        </a>
        </div>
    </div>
    <?if($passed=="TRUE"){?>
    <?if($level=="admin"){?>
    <div class="ui-block-c">
         <div class="ui-bar-c"> <a style="text-decoration:none" href="#showcompany" data-transition="slide">
        <img alt="alt..." src="PYS/company.png" />
         <p style="text-align:center;">廠商資料</p>
        </a>
        </div>
         </div>
  <?}else{?>

    <div class="ui-block-c">
         <div class="ui-bar-c"> <a style="text-decoration:none" href="#" data-transition="slide">
        <img alt="alt..." src="PYS/order.png" />
         <p style="text-align:center;">詢價單</p>
        </a>
        </div>
    </div>
     <?}?>
  <?}?>
<?if($passed=="TRUE"){?>
    <div class="ui-block-a">
        <div class="ui-bar-c"> <a style="text-decoration:none" href="#" data-transition="slide">
        <img alt="alt..." src="PYS/fix.png" />
        <p style="text-align:center;">預約維修</p>
        </a>
        </div>
    </div>
    <div class="ui-block-b">
        <div class="ui-bar-c"> <a style="text-decoration:none" href="#" data-transition="slide">
        <img alt="alt..." src="PYS/List.png" />
         <p style="text-align:center;">維修紀錄</p>
      </a>
        </div>
    </div>
    <?}?>
    <div class="ui-block-c">
        <div class="ui-bar-c"> <a style="text-decoration:none" href="#member" data-transition="slide">
        <img alt="alt..." src="PYS/User.png" />
         <p style="text-align:center;">會員資料</p>
        </a>
        </div>
    </div>
</div>
  <div data-role="collapsible" data-collapsed="true" data-theme="a">
    <h2>關於我們</h2>  
        <h4>公司名稱:保意興有限公司</h4> 
        <h4>聯絡人:林先生</h4> 
        <h4>電話:<a href="tel://(04)2207-0121">(04)2207-0121</a></h4>
        <h4>手機:<a href="tel://0910-799646">0910-799646</a></h4>  
        <h4>傳真:(04)2207-0121</h4> 
        <h4>地址:<a href="geo:0,0?q=台中市大雅區中清路1188號">台中市大雅區中清路1188號</a></h4>                    
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
                                    <a href="#toyota" data-transition="slide">
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
                        <li><a href="#home" data-icon="home" data-transition="slide">回首頁</a></li>
                        <li><a href="#product" data-icon="gear" data-transition="slide">產品介紹</a></li>
                        <?if($passed=="TRUE"&&$level=="user"){?>
                        <li><a href="#" data-icon="search" data-transition="slide"><span id="clicks1"style="color:red">0</span> 詢價單</a></li>
                        <li><a href="#" data-icon="grid" data-transition="slide">預約維修</a></li>
                         <?}else if($level=="admin"){?>
                         <li><a href="#showcompany" data-icon="search" data-transition="slide">廠商資料</a></li>
                         <li><a href="#" data-icon="edit" data-transition="slide">維修紀錄</a></li>
                         <?}?>
                        <li><a href="#member" data-icon="info" data-transition="slide">會員資料</a></li>
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
              <form action="update.php" method="post"  name="myForm">
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
                <input id="update" type="submit" data-theme="a" value="修改資料" />
                <button type="button" data-theme="a" onclick="location.href='#editpassword'" data-transition="slide">修改密碼</button>
               <?if($level=="admin"){?>
               <button type="button" data-theme="a" onclick="location.href='#postnews'">發布公告</button>
               <?}?>
                <button type="button" data-theme="b" onclick="location.href='logoutsuccess.php'">登出</button>
                </form>
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
<button type="button" data-theme="c" onclick="location.href='#'" data-transition="slide">忘記密碼</button>
<button type="button" data-theme="a" onclick="location.href='#'" data-transition="slide">註冊</button>
</div>


</form>
                <?}?>

            </div>
            <div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home" data-transition="slide">回首頁</a></li>
                        <li><a href="#product" data-icon="gear" data-transition="slide">產品介紹</a></li>
                        <?if($passed=="TRUE"&&$level=="user"){?>
                        <li><a href="#" data-icon="search" data-transition="slide"><span id="clicks1"style="color:red">0</span> 詢價單</a></li>
                        <li><a href="#" data-icon="grid" data-transition="slide">預約維修</a></li>
                         <?}else if($level=="admin"){?>
                         <li><a href="#showcompany" data-icon="search" data-transition="slide">廠商資料</a></li>
                         <li><a href="#" data-icon="edit" data-transition="slide">維修紀錄</a></li>
                         <?}?>
                        <li><a href="#member" data-icon="info" data-transition="slide">會員資料</a></li>
                    </ul>
                </div>
             
            </div>
        </div>
         <div data-role="page" id="toyota" data-add-back-btn="true" data-back-btn-text="回上一頁">
            <div data-role="header" data-position="fixed">
                <h1>TOYOTA</h1>
            </div>
    <div data-role="collapsible" data-collapsed="false" data-theme="e">
    <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                                <li data-role="list-divider">TOYOTA</li>
<?php
for($i=1;$i<=mysql_num_rows($datatoyota);$i++)
{ $rs=mysql_fetch_assoc($datatoyota);
?>

                                <li  <?if($passed=="TRUE"&&$level=="user"){?>data-icon="plus"<?}else{?>  data-icon="false"<?}?>     onClick="onClick()">
                                    <a>
                                        <img class="ui-li-thumb2" src="<?php echo $rs["picture"]?>"/>
                                        <h1><?php echo $rs["productname"]?></h1>
                                        <p>重量:<?php echo $rs["weigh"]?></p>
                                        <p>揚高:<?php echo $rs["mast"]?></p>
                                        <p>編號:<?php echo $rs["number"]?></p>
                                        <p>年分:<?php echo $rs["year"]?></p>
                                        <p>狀態:<?php echo $rs["state"]?></p>
                                        <?if($passed=="TRUE"&&$level=="user"){?>
                                        <span class="ui-li-count">加入詢價單</span>   
                                        <?}?>                            
                                    </a >
                                </li>
<?php }?>
</ul> 
</div>
<div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home" data-transition="slide">回首頁</a></li>
                       <?if($passed=="TRUE"&&$level=="user"){?>
                        <li><a href="#" data-icon="search" data-transition="slide"><span id="clicks"style="color:red">0</span> 詢價單</a></li>
                        <?}?>
                    </ul>
                </div>
            </div>
            </div>

            <div data-role="page" id="news" data-add-back-btn="true" data-back-btn-text="回上一頁">
            <div data-role="header" data-position="fixed">
                <h1>公告欄</h1>
            </div>
            <div data-role="collapsible" data-collapsed="false" data-theme="b">
                            <h2>最新消息</h2>
                            <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                               
<?php
for($i=1;$i<=mysql_num_rows($datanews);$i++)
{ $rs=mysql_fetch_assoc($datanews);
?>

                                <li>
                                    <a href="#fullnews" data-transition="slide">
                                        <h3><?if($rs{"time"}>=$t){?> <img src='PYS/new.gif'><?}?><?php echo $rs["date"]?></h3>  
                                        <h1><?php echo $rs["title"]?></h1>                 
                                    </a >
                                </li>
 <?php }?>
 
</ul> 
</div>
 <div data-role="collapsible" data-collapsed="true" data-theme="b">
                            <h2>最新活動</h2>
                            <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                     <?php
for($i=1;$i<=mysql_num_rows($datanewsa);$i++)
{ $rs=mysql_fetch_assoc($datanewsa);
?>

                                <li>
                                    <a href="#fullnews" data-transition="slide">
                                        <h3><?if($rs{"time"}>=$t){?> <img src='PYS/new.gif'><?}?><?php echo $rs["date"]?></h3>  
                                        <h1><?php echo $rs["title"]?></h1>                 
                                    </a >
                                </li>
 <?php }?>
</ul> 
</div>
<div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home" data-transition="slide">回首頁</a></li>
                        <li><a href="#member" data-icon="edit" data-transition="slide">會員資料</a></li>
                    </ul>
                </div>
            </div>
            </div>



 <div data-role="page" id="editpassword" data-add-back-btn="true" data-back-btn-text="回上一頁">
            <div data-role="header" data-position="fixed">
                <h1>修改密碼</h1>
            </div>
             <div data-role="content">
             <form name="changepassword" action="changepassword.php" method="post" data-ajax="false">
                 <div data-role="content">
                <div data-role="fieldcontain">
                <label for="oldpassword">舊密碼</label>
            <input type="password" name="oldpassword" id="oldpassword"/>
            </div>
             <div data-role="fieldcontain">
                <label for="setpassword">新密碼</label>
            <input type="password" name="setpassword" id="setpassword"/>
              </div>
             <div data-role="fieldcontain">
            <label for="repassword">確認密碼</label>
            <input type="password" name="repassword" id="repassword"/>
              </div>
              <input id="change" type="submit" data-theme="b" value="修改密碼" />
                </div>
             </form>
             </div>
            </div>

 <div data-role="page" id="postnews" data-add-back-btn="true" data-back-btn-text="回上一頁">
<div data-role="header" data-theme="e" style="text-align:center;">
                <img src="PYS/PYS.PNG" />
                 <div data-role="header" data-position="fixed">
                <h1>發布公告</h1>
            </div>
            </div>
            <form id="noticeboard-form" action="post.php" method="POST">
  <input type="text" class="form-control" name="title" id="title" placeholder="輸入標題"></input>
  <select class="form-control" name="class" id="class">
    <option value="新聞">新聞</option>
    <option value="活動">活動</option>
  </select>
  <input type="number" name="time" id="time" min="1" max="5"  placeholder="new顯示天數"></input>
  <textarea class="ckeditor" rows="5" id="content" name="content" placeholder="內容"></textarea>
  <button type="submit" class="btn btn-primary" data-theme="b">Submit</button>
  </form>
</div> 

 <div data-role="page" id="showcompany" data-add-back-btn="true" data-back-btn-text="回上一頁">
                 <div data-role="header" data-position="fixed">
                <h1>廠商資料</h1>
            </div>
            <div data-role="collapsible" data-collapsed="false" data-theme="e">
    <ul data-role="listview" data-inset="true" data-theme="e" data-dividertheme="a" data-filter="true" data-filter-placeholder="請輸入....">
                                <li data-role="list-divider">廠商資料</li>
<?php
for($i=1;$i<=mysql_num_rows($datacompany);$i++)
{ $rs=mysql_fetch_assoc($datacompany);
?>

                                <li>
                                    <a>
                                        <h1>公司名稱:<?php echo $rs["cname"]?></h1>
                                        <h4>聯絡人:<?php echo $rs["uname"]?></h4>
                                        <h4>電話:<a href="tel://<?php echo $rs["phone"]?>"><?php echo $rs["phone"]?></a></h4>
                                        <h4>電話:<?php echo $rs["phone"]?></h4>
                                        <h4>手機:<?php echo $rs["cellphone"]?></h4>
                                        <h4>地址:<?php echo $rs["address"]?></h4>
                                        <h4>E-mail:<?php echo $rs["email"]?></h4>                          
                                    </a >
                                </li>
<?php }?>
</ul> 
</div>
<div data-role="footer" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#home" data-icon="home" data-transition="slide">回首頁</a></li>
                        <li><a href="#member" data-icon="edit" data-transition="slide">會員資料</a></li>
                    </ul>
                </div>
            </div>
            </div>

            </div>
</body>
</html>
