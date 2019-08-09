<?php
$title='添加商品';
include './head.php';

$sql = "select * from ayangw_type";
$res =$DB->query($sql);
$t = "";

while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['tName']}</option>";
}

?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") !=$.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
<div class="panel panel-primary" style=" max-width:80%; margin: 0 auto;margin-top: 75px;">
<div class="panel-heading"><h3 class="panel-title">添加商品</h3></div>
<div class="panel-body">
  <form action="" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">选择改商品的分类</label>
		<div class="col-lg-8">
			<select class="form-control" id="type" name="type" default="">
			<option value="">----    选择商品分类    ----</option>
			<?php echo $t;?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">商品名称</label>
		<div class="col-lg-8">
			<input type="text" name="g_name" id="g_name"  class="form-control">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-lg-3 control-label">商品介绍</label>
		<div class="col-lg-8">
		<input type="text" name="g_info" id="g_info"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">商品价格</label>
		<div class="col-lg-8">
			<input type="text" name="g_price" id="g_price"  class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">是否上架</label>
		<div class="col-lg-8">
			<select class="form-control" id="state" name="state" default="">
			<option value='1'>上架</option>
			<option value='0'>停售</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8">
	  <input type="button" name="submit_addsp" id="submit_addsp" value="添加商品" class="btn btn-primary form-control"/><br/>
	 </div></div></form></div></div>
	 <?php ?>