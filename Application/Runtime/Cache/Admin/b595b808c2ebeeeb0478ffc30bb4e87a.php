<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>新闻管理系统</title>
	<link rel="stylesheet" href="/newsSys_php/Public/Common/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/newsSys_php/Public/Admin/css/style.css"/>
	<script src="/newsSys_php/Public/Common/js/jquery.min.js"></script>
	<script src="/newsSys_php/Public/Common/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse rect">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">新闻后台管理系统</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="javascript:;" class="login-info">欢迎您：<?php echo ($admin_name); ?></a></li>
				<li><a href="/newsSys_php/" target="_blank">前台首页</a></li>
				<li><a href="<?php echo U('Login/logout');?>">退出登录</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-2">
				<div class="panel panel-default menu">
					<div class="panel-heading menu-head">管理菜单</div>
					<div class="panel-body menu-body">
						<div class="list-group menu-list">
							<a href="<?php echo U('Index/index');?>" class="list-group-item " id="Index_index">后台首页</a>
							<a href="<?php echo U('List/add');?>" class="list-group-item" id="List_add">新闻添加</a>
							<a href="<?php echo U('List/index');?>" class="list-group-item " id="List_index">新闻列表</a>
							<a href="<?php echo U('Category/index');?>" class="list-group-item " id="Category_index">新闻分类</a>
							<a href="#" class="list-group-item ">会员管理</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-10">
				<div class="content">
				<div class="item">
<div class="item-title">后台首页</div>

<div class="panel panel-default">
	<div class="panel-heading">欢迎访问</div>
	<div class="panel-body">
		欢迎进入新闻后台管理系统！请从左侧选择一个操作。
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<div class="panel-body server-info">
		<ul class="list-group server-info-list">
			<li class="list-group-item">系统环境：<?php echo ($serverInfo['server_version']); ?></li>
			<li class="list-group-item">服务器时间：<?php echo ($serverInfo['server_time']); ?></li>
			<li class="list-group-item">MySQL版本：<?php echo ($serverInfo['mysql_version']); ?></li>
			<li class="list-group-item">文件上传限制：<?php echo ($serverInfo['max_upload']); ?></li>
			<li class="list-group-item">脚本执行时限：<?php echo ($serverInfo['max_ex_time']); ?></li>
		</ul>
	</div>
</div>
</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>

	//切换菜单背景
	$("#<?php echo (CONTROLLER_NAME); ?>_<?php echo (ACTION_NAME); ?>").addClass("active");

</script>
</body>
</html>