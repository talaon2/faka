<?php

$title='后台管理';
include './head.php';


?>
 <script type="text/javascript">
    if($.cookie("user") == null || $.cookie("user") == "" || $.cookie("loginInfo") != $.md5($.cookie("pass"))){
    	window.location.href='./login.php';
    }else{

    }
    </script>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php 
if($_GET['mod'] == "site"){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form">
  <div class="form-group">
	  <label class="col-sm-2 control-label">网站域名</label>
	  <div class="col-sm-10"><input type="text" name="web_url" id="web_url" value="<?php echo  $conf['web_url'] ?>" class="form-control" required/>
	  <span style="color:red; font-weight: bold;"> * 域名格式必须为：http://xxxx.xxx.xx/ 系统检查您的域名应填：http://<?php echo  $_SERVER['HTTP_HOST']?>/</span></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="sitename" id="web_name" value="<?php echo  $conf['title'];  ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏描述</label>
	  <div class="col-sm-10"><input type="text" name="title" id="web_description" value="<?php echo $conf['description'];  ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" id="web_keywords" value="<?php echo $conf['keywords']; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">客服ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="kfqq" id="web_qq" value="<?php echo $conf['zzqq']; ?>" class="form-control"/></div>
	</div><br/>

	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告1</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_notice2" name="anounce" rows="5"><?php echo $conf['notice2'];?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">首页公告2</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_notice3" name="anounce" rows="5"><?php echo $conf['notice3'];?></textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">发货页面公告</label>
	  <div class="col-sm-10"><textarea class="form-control" id="dd_notice" name="dd_notice" rows="5"><?php echo $conf['dd_notice'];?></textarea></div>
	</div><br/>
<div class="form-group">
	  <label class="col-sm-2 control-label">底部版权</label>
	  <div class="col-sm-10"><textarea class="form-control" id="web_foot" name="anounce" rows="5"><?php echo $conf['foot'];?></textarea></div>
	</div><br/>
	<div class="form-group">
		<label class="col-sm-2 control-label">首页显示库存</label>
		<div class="col-sm-10">
			<select class="form-control" id="showKc" name="showKc">
				<option value="1" <?php if($conf['showKc']==1) echo "selected"; ?> >显示</option>
				<option value="2" <?php if($conf['showKc']==2) echo "selected"; ?>>不显示</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">防CC模式</label>
		<div class="col-sm-10">
			<select class="form-control" id="CC_Defender" name="CC_Defender">
				<option value="1" <?php if($conf['CC_Defender']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['CC_Defender']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">反腾讯检测</label>
		<div class="col-sm-10">
			<select class="form-control" id="txprotect" name="txprotect">
				<option value="1" <?php if($conf['txprotect']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['txprotect']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
		<label class="col-sm-2 control-label">QQ跳转</label>
		<div class="col-sm-10">
			<select class="form-control" id="qqtz" name="qqtz">
				<option value="1" <?php if($conf['qqtz']==1) echo "selected"; ?> >开启</option>
				<option value="2" <?php if($conf['qqtz']==2) echo "selected"; ?>>关闭</option>
			</select>
		</div>
	</div><br />
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
	<input type="button"  id="submit_webInfo" value="修改保存" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}elseif($_GET['mod'] =='pay'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">支付接口商户配置</h3></div>
<div class="panel-body">
  <form >

	<a href="#">尚未开通，敬请期待！</a><br>
  </form>
</div>
</div>

<?php
}elseif($_GET['mod'] =='admin'){?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">管理员信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=pay_n" method="post" class="form-horizontal" role="form">
	
	<div class="form-group">
		<label class="col-lg-3 control-label">管理员账号</label>
		<div class="col-lg-8">
			<input type="text" id="web_admin" name="web_admin" class="form-control"
				   value="<?php echo $conf['admin']?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">旧密码</label>
		<div class="col-lg-8">
			<input type="text" id="jiu_pwd" name="jiu_pwd" class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">新密码</label>
		<div class="col-lg-8">
			<input type="text" id="web_pwd" name="web_pwd" class="form-control" >
		</div>
	</div>

	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="button" id="submit_admin" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>

<?php
}else if($_GET['mod']=="email"){
    include '../emailConfig.php';
    ?>
    <div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">邮箱配置　　* 用于给用户发送订单信息</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=sfEmail" method="post" class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱SMTP服务器:</label>
		<div class="col-lg-8">
			<input type="text" id="host" name="host" class="form-control"
				   value="<?php echo $emailConfig['host'];?>">
				   <font color="green">示例：smtp.163.com</font>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-lg-3 control-label">设置发件人姓名</label>
		<div class="col-lg-8">
			<input type="text" id="fromName" name="fromName" class="form-control"
				   value="<?php echo $emailConfig['fromName'];?>">
			<font color="green">示例：个人发卡平台</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱SMTP端口:</label>
		<div class="col-lg-8">
			<input type="text" id="port" name="port" class="form-control"
				   value="<?php echo $emailConfig['port'];?>">
		     <font color="green">示例：25</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱账号</label>
		<div class="col-lg-8">
			<input type="text" id="user" name="user" class="form-control"
				   value="<?php echo $emailConfig['user'];?>">
		     <font color="green">示例：123456</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮箱密码</label>
		<div class="col-lg-8">
			<input type="text" id="pwd" name="pwd" class="form-control"
				   value="<?php echo $emailConfig['pwd'];?>">
		       <font color="green">示例：自己设置</font>
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">发件人邮箱地址</label>
		<div class="col-lg-8">
			<input type="text" id="from" name="from" class="form-control" value="<?php echo $emailConfig['from']?>">
		   <font color="green">示例：123456@163.com</font>
		</div>
		
	</div>
	<div class="form-group">
		<label class="col-lg-3 control-label">邮件标题</label>
		<div class="col-lg-8">
			<input type="text" id="title" name="title" class="form-control" value="<?php echo  $emailConfig['title']?>">
		    <font color="green">示例：个人发卡平台</font>
		</div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-3 col-sm-8"><input type="submit" id="submit_email" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div> 
    
<?php
 }elseif($_GET['mod']=="sfEmail"){
    if($_POST['host'] == "" || $_POST['port'] == "" || $_POST['user'] == "" || $_POST['from'] == ""){
        showmsg("重要信息不能为空！");
        exit();
    }
     $text="<?php
 \$emailConfig = array(
  'host'=>'".$_POST['host']."',//邮箱的服务器地址
  'fromName'=>'".$_POST['fromName']."',//设置发件人姓名（昵称） 任意内容
  'port'=>'".$_POST['port']."',//端口
  'user'=>'".$_POST['user']."',//邮箱账号
  'pwd'=>'".$_POST['pwd']."',//邮箱密码
  'from'=>'".$_POST['from']."',//设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
  'title'=>'".$_POST['title']."'//添加该邮件的主题
  );
?>
";
     saveFile("../emailConfig.php",$text);
     showmsg("ok!",1);
 }elseif($_GET['mod']=='upimg'){
 
showmsg("请直接替换assets/imgs/logo.png图片，尺寸：300*82"); 
 
 }
?>
<script>
var items = $("select[default]");
if (typeof c == 'undefined')	window.close();
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default"));
}
</script>
    </div>
  </div>
  