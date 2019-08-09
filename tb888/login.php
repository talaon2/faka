<?php

session_start();

@header('Content-Type: text/html; charset=UTF-8');

$title='用户登录';
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>后台管理中心</title>
  <link href="../layer/bootstrap.min.css" rel="stylesheet"/>
  <script src="../layer/jquery.min.js"></script>
  <script src="../layer/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="js/jquery.cookie.js"></script>
  <script src="js/ayangw.js"></script>
  <script src="js/jquery.md5.js"></script>
  <script src="../layer/layer.js"></script>

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
          <li class="active">
            <a href="./login.php"><span class="glyphicon glyphicon-user"></span> 登陆</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">用户登陆</h3></div>
        <div class="panel-body">

            <div class="input-group">
              <span class="input-group-addon">⊙</span>
              <input type="text" id="user" name="user" value="" class="form-control" placeholder="用户名" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">⊙</span>
              <input type="password" id="pass" name="pass" class="form-control" placeholder="登陆密码" required="required"/>
            </div><br/>
			<div class="input-group">
              <span class="input-group-addon">⊙</span>
              <input type="password" id="anmi" name="anmi" class="form-control" placeholder="安全密码" required="required"/>
            </div><br/>
            <div class="form-group">
              <div class="col-xs-12"><input type="button" id="login_submit" value="登陆" class="btn btn-primary form-control"/></div>
            </div>

        </div>
      </div>
    </div>
  </div></body></html>
