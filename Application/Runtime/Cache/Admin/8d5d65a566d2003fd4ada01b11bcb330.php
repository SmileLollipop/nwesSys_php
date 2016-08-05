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
				<div class="item"><div class="item-title">新闻添加</div>

<div class="top-button">
	<a href="<?php echo U('List/index');?>" class="btn btn-warning">返回新闻列表</a>
</div>

<?php if(isset($success)): ?><div class="message">~ ~ ~  添加成功!  ~ ~ ~  </div><?php endif; ?>

<div class="panel panel-default addNews-panel">
	<div class="panel-body">
		<form class="form-horizontal" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<label for="newsCategory" class="col-sm-2 control-label">新闻分类：</label>
					<div class="col-sm-3">
						<select class="form-control" name="cid" id="newsCategory" >
							<option value="0">未分类</option>
							<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="newsTitle" class="col-sm-2 control-label">新闻标题：</label>
					<div class="col-sm-7">
						<input type="text" name="title" class="form-control" id="newsTitle" value="<?php echo ($old["title"]); ?>">
					</div>
					<?php if(isset($errors['title'])): ?><span class="tip col-sm-3"><?php echo ($errors["title"]); ?></span><?php endif; ?>
				</div>
				<div class="form-group">
					<label for="newsLable" class="col-sm-2 control-label">新闻标签：</label>
					<div class="col-sm-4">
						<input type="text" name="lable" class="form-control" id="newsLable" value="<?php echo ($old["lable"]); ?>">
					</div>
					<?php if(isset($errors['lable'])): ?><span class="tip col-sm-4"><?php echo ($errors["lable"]); ?></span><?php endif; ?>
				</div>
				<div class="form-group">
					<label for="newsImage" class="col-sm-2 control-label">新闻图片：</label>
					<div class="col-sm-5">
						<input type="file" name="img" class="form-control" id="newsImage" >
					</div>
					<?php if(isset($uploadError)): ?><span class="tip col-sm-3"><?php echo ($uploadError); ?></span><?php endif; ?>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-warning">添加新闻</button>
					</div>
				</div>
			</form>
	</div>
</div>

<script>
	$("#newsCategory").val(<?php echo ($old[cid]); ?>);
</script></div>
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