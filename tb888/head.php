<?php

include '../ayangw/common.php';
@header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>后台管理中心</title>
<link href="../layer/bootstrap.min.css" rel="stylesheet"/>
  <script src="../layer/jquery.min.js"></script>
  <script src="../layer/bootstrap.min.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/jquery.md5.js"></script>

  <script src="../layer/layer.js"></script>
    <script src="js/ayangw.js"></script>
   
</head>
<body>

  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">后台管理中心</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="./">⊙ 平台首页</a>
          </li>
		  <li class="">
            <a href="./list.php">⊙ 订单管理</a>
          </li>
          <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">⊙ 卡密管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
             <li class="">
                 <a href="./kmlist.php">● 卡密列表</a>
             </li>
			  <li class="">
                 <a href="addkm.php">● 添加卡密</a>
             </li>
            </ul>
          </li>
		  <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">⊙ 商品管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="">
            <a href="./clist.php">● 商品列表</a>
            </li>
			  <li class="">
                 <a href="./addgoods.php">● 添加商品</a>
             </li>
              </li>
			  <li class="">
                 <a href="./addGType.php">● 商品分类管理</a>
             </li>
            </ul>
          </li>
		  
		  <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">⊙ 系统设置<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./set.php?mod=admin">● 管理员配置</a><li>
               <li><a href="./set.php?mod=upimg">● 首页LOGO配置</a><li>
              <li><a href="./set.php?mod=site">● 网站信息配置</a></li>
            <!-- <li><a href="./set.php?mod=email">● 发件邮箱配置</a><li>
			  <li><a href="./set.php?mod=pay">● 支付接口配置</a><li> -->

            </ul>
          </li>
          <li><a href="./login.php">⊙ 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
