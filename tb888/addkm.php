<?php

$title='卡密管理';
include './head.php';
if(!empty($_POST['goods']) && !empty($_POST['txtKm'])){
    $g = $_POST['goods'];
    $str = $_POST['txtKm'];
    $arr = explode("\n",$str);
    if(count($arr) < 1){
        exit("<script>layer.msg('没有获取到有效卡密');window.location.href='addkm.php'</script>") ;
    }
    for($i = 0; $i <count($arr);$i++){
        $sql = "insert into ayangw_km(gid,km,benTime) values({$g},'{$arr[$i]}',now())";
         $DB->query($sql);
    }
    echo "<script>layer.msg('成功添加".count($arr)."张卡密！');window.location.href='addkm.php'</script>";
}

$sql = "select * from ayangw_goods";
$res =  $DB->query($sql);
$t = "";
while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['gName']}</option>";
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }
  
    </script>
<div class="panel panel-primary" style=" max-width:80%; margin: 0 auto;margin-top: 75px;">
<div class="panel-heading"><h3 class="panel-title">商品添加卡密</h3></div>
<div class="panel-body">
  <form action="" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">选择要添加卡密的商品</label>
		<div class="col-lg-8">
			<select class="form-control" id="goods" name="goods" default="">
			<?php echo $t;?>
			</select>
		</div>
	</div>


	<div class="form-group">
		<label class="col-lg-3 control-label">导入卡密（一行一个）</label>
		<div class="col-lg-8">
			<textarea id="txtKm" name="txtKm" rows="8" cols="100%"></textarea>
		</div>
	</div>
	<script type="text/javascript">if (typeof c == 'undefined')	window.close();</script>
	
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="submit" name="submit_km" id="submit_km" value="添加卡密" class="btn btn-primary form-control"/><br/>
	 </div></div></form></div></div>