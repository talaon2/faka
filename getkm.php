<?php
header("Content-Type: text/html; charset=utf-8");
include 'ayangw/common.php';


if(!empty($_GET['out_trade_no'])){
    $t = $_GET['out_trade_no'];
}else{
    $t = "";
}
$km ="";

if(!empty($_POST['tqm'])){
    $tqm = $_POST['tqm'];
    $sql = "select * from ayangw_km
    where out_trade_no ='{$tqm}' or trade_no = '{$tqm}' or rel = '{$tqm}'
    ORDER BY endTime desc
    limit 1";
    
    $res = $DB->query($sql);
    if($row = $DB->fetch($res)){
        $sql2 = "select * from ayangw_goods where id =".$row['gid'];
        $res2 = $DB->query($sql2);
        $row2 =$DB->fetch($res2);
    }else{
        exit("<script>alert('无此条记录！');window.location.href='getkm.php'</script>");
        
    }
}

$mod=isset($_GET['act'])?$_GET['act']:null;
if($mod == "email"){
   
}

function isEmail($email){
    $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
    if(preg_match($mode,$email)){
        return true;
    }
    else{
        return false;
    }
}


?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>卡密提取 - <?php echo $conf['title'];?></title>
  <meta name="keywords" content="<?php echo $conf['keywords'];?>">
  <meta name="description" content="<?php echo $conf['description'];?>">
  <link href="layer/bootstrap.min.css" rel="stylesheet"/>
  
  <script src="layer/jquery.min.js"></script>
  <script src="layer/bootstrap.min.js"></script>
  <script src="layer/jquery.cookie.min.js"></script>
  <script src="layer/layer.js"></script>

  <script src="layer/jquery-1.9.1.min.js"></script>
  <script src="js/ayangw.js"></script>
<script>

</script>
<style>
.mytab{
	margin-top:20px;
	
	text-align: center;
}

img.logo{width:14px;height:14px;margin:0 5px 0 3px;}
body{
	background-image: url("assets/imgs/bj3.jpg");
	background-repeat: repeat;
}
</style>
</head>
<body>
<div style="height: 20px;">

</div>
<div class="container">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-9 center-block" style="float: none;">

    <div class="panel panel-default" style="border: 2px solid #63B8FF;">
        <div class="panel-body" style="text-align: center;" >
<img alt="" style="max-width:100%" src="assets/imgs/logo.png">
    </div>
    </div>
    <div class="panel panel-primary">
<div class="panel-body" style="text-align: center;">
	<div class="list-group">
		<div class="list-group-item list-group-item-warning">
			注意事项：<br>
			<br>
			<?php echo $conf['dd_notice']?><br>
		</div>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#onlinebuy" data-toggle="tab">提取卡密</a></li>
			<li><a href="index.php">在线下单</a></li>
		</ul>
		<?php if(empty($_GET['act'])) {?>
		<div class="list-group-item">
			<div id="myTabContent" class="tab-content">
			<form action="getkm.php?act=query" method="POST">
			<div class="form-group">
					
					<input type="text" name="tqm" id="tqm" value="<?php if($t != ""){ echo $t;}?>" class="form-control text-center" placeholder="输入联系方式/订单编号/商户单号/都可以提取到您的卡密" required/>
				</div>
			
				<input type="submit" id="sub_query" class="btn btn-primary btn-block" value="提取卡密">
			     
			</div>
			</form>
	</div>
	<?php }elseif ($_GET['act'] == "query") { 
	/**/
	    ?>
	<div class="list-group-item">
			<div id="myTabContent" class="tab-content">
			<form action="getkm.php?act=email&a=<?php echo $row['out_trade_no'];?>&b=<?php echo $row2['gName'];?>&c=<?php echo $row['km'];?>&sj=<?php echo $row['endTime']?>" method="POST">
			<div class="form-group">
					<div class="input-group"><div class="input-group-addon">订单遍号</div>
					<input type="text" name="bh"  value="<?php echo $row['out_trade_no'];?>" class="form-control" placeholder="" disabled/>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">商品名称</div>
					<input type="text" name="mc" value="<?php echo $row2['gName'];?>" class="form-control" placeholder="" disabled/>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">成交时间</div>
					<input type="text" name="sj" value="<?php echo $row['endTime']?>" class="form-control" placeholder="" disabled/>
				</div></div>
				<div class="form-group">
					<div class="input-group"><div class="input-group-addon">您的卡密</div>
					<input type="text" name="km"  value="<?php echo $row['km'];?>" class="form-control" placeholder="" >
				</div></div>
		
			    
			</div>
			</form>
	</div>
	
	
	
	<?php }else if($_GET['act'] == "email"){
	    require_once("./System/functions.php");
	    require_once("./System/ayang.php");
	    header("Content-Type: text/html; charset=utf-8");
	    
	   $bh = $_GET['a'];//订单编号
	    $mc = $_GET['b'];//名称
	    $km = $_GET['c'];//卡密
	     $goal = $_POST['yx'];//目标邮箱
	    $time = $_GET['sj'];//时间
	    if($goal == null || $goal == ""){
	        exit("<script>alert('收件邮箱不能为空！');window.history.go(-1);</script>");
	    }
	    if(isEmail($goal)==false){
	        exit("<script>alert('邮箱格式错误！');window.history.go(-1);</script>");
	    }
	    $content = "<br>　　您购买的商品：".$mc."<br>　　订单编号：".$bh."<br>　　购买时间为：".$time."<br>　　您的卡密为：".$km;
	    $foot = $conf['description'];
	    $fromName = $conf['title'];
	    $str = getM1($goal,$content,$foot,$fromName);
	   
	    $flag = sendMail($goal,$str);
	 
	    if( $flag ){
	        exit("<script>alert('发送成功！');window.location.href='getkm.php';</script>");
	    }else{
	        exit("<script>alert('发送失败！');window.location.href='getkm.php';</script>");
	    }
	    
	} ?>
		<hr/>
		<div class="container-fluid">
			
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['zzqq']?>&site=qq&menu=yes" class="btn btn-info btn-sm">联系客服</a>
		</div>
		<br>
		<span>Copyright © 2019 <?php echo $conf['foot']?></span>
	
		
		</div></div>
</div>
</div></div>

</body>
</html>
<script>

	</script>