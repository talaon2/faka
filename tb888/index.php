<?php

/**
 * 后台管理中心
**/

$title='后台管理';
include './head.php';
$r1 = $DB->count("SELECT COUNT(id) from ayangw_order");
$r2 = $DB->count("SELECT COUNT(id) from ayangw_order  where sta = 1");
$r3 =$DB->count("select COUNT(id) from ayangw_km");
$r4 = $DB->count("SELECT COUNT(id) from ayangw_km  where stat = 0");
$r5 =$DB->count("SELECT COUNT(id) from ayangw_km  where stat = 1");
$r6 = $DB->count("select COUNT(id)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now())");
$r7 =$DB->count("select SUM(money)
from ayangw_order
where YEAR(benTime) = YEAR(NOW()) and  day(benTime) = day(NOW()) and MONTH(benTime) = MONTH(now()) and sta = 1");
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{
    	if (typeof c == 'undefined')	window.close();    
    }
    </script>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
          <ul class="list-group">
         
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b></b>订单总数:<?php echo $r1?>　　交易完成:<?php echo $r2?>　　今日订单数:<?php echo $r6?>　　今日成交金额:<?php if($r7 != ""){ echo round($r7,2);}else{ echo "0";};?>￥
			
			</li>
			<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b></b>卡密总数:<?php echo $r3?> 　剩余:<?php echo $r4?>　已卖出:<?php echo $r5?>
			
			</li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b><?php echo date("Y-m-d h:i:sa")?>  </li>
			<li class="list-group-item"><span class="glyphicon glyphicon-home"></span> <a href="../" class="btn btn-xs btn-primary">返回用户首页</a>&nbsp;<a href="./list.php" class="btn btn-xs btn-success">订单管理</a>&nbsp;<a href="./kmlist.php" class="btn btn-xs btn-warning">卡密管理</a>
			</li>
          </ul>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">网站信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>当前网站名称：</b><?php echo $conf['title'] ?>
		</li>
		<li class="list-group-item">
			<b>当前网站域名：</b><?php echo $_SERVER['HTTP_HOST'] ?>
		</li>
		<li class="list-group-item">
			<b>网站客服QQ：</b><?php echo $conf['zzqq'] ?>
		</li>
		<li class="list-group-item">
			<b>源码来源：</b><a href="https://www.52pojie.cn/">吾爱破解</a>
		</li>
		<li class="list-group-item">
			<b>检查更新：</b><span id="up"><?php if($s['v']<=VERSION){ echo "<font STYLE='color: green;'>最新版本</font>";}else{ echo "<font STYLE='color:red;'>发现新版本</font>";}?></span>
		</li>
	</ul>
</div>
    </div>
  </div>