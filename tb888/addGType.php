<?php

$title='添加商品';
include './head.php';


$sql = "select * from ayangw_type";
$res = $DB->query($sql);
$t = "";
while ($row = $DB->fetch($res)){
    $t .= "<option value='{$row['id']}'>{$row['tName']}</option>";
}
?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
<div class="panel panel-primary" style=" max-width:80%; margin: 0 auto;margin-top: 75px;">
<div class="panel-heading"><h3 class="panel-title">商品分类管理</h3></div>
<div class="panel-body">
  <form action="" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">已添加的分类</label>
		<div class="col-lg-8">
			<select class="form-control" id="g_type" name="g_type" default="">
			<option value="">----    选择分类    ----</option>
			<?php echo $t;?>
			</select>
		</div>
	</div>
    
    
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8">
	  <input type="button" name="up_type" id="up_type" value="删除该分类" class="btn btn-primary form-control"/><br/>
	 </div>
	 </div>
<hr>
	<div class="form-group">
		<label class="col-lg-3 control-label">分类名称</label>
		<div class="col-lg-8">
			<input type="text" name="t_name" id="t_name"  class="form-control">
		</div>
	</div>

	
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8">
	  <input type="button" name="submit_addtype" id="submit_addtype" value="添加分类" class="btn btn-primary form-control"/><br/>
	 </div>
	 </div>
	 
	 
	 </form></div></div>