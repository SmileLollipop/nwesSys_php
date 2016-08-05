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
				<div class="item"><div class="item-title">新闻列表</div>

<div class="top-button">
	<form class="form-inline">
		<label>选择新闻分类：</label>
		<select id="category" class="form-control" >
			<option value="-1">全部</option>
			<option value="0" <?php if(($cid) == "0"): ?>selected<?php endif; ?>>未分类</option>
			<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $cid): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo U('List/add');?>" class="btn btn-warning">添加新闻</a>
	</form>
</div>
<!--新闻信息列表-->
<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped list-table">
			<thead>
			<tr>
				<th style="width:6%">分类</th>
				<th style="width:30%">标题</th>
				<th style="width:10%">标签</th>
				<th style="width:25%">图片</th>
				<th style="width:15%">创建时间</th>
				<th style="width:14%">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($list["data"])): foreach($list["data"] as $key=>$v): ?><tr>
					<td>
						<?php if(empty($v["cid"])): ?><a href="<?php echo U('List/index','cid=0');?>">未分类</a>
							<?php else: ?>
							<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["category_name"]); ?></a><?php endif; ?>
					</td>
					<td><?php echo ($v["title"]); ?></td>
					<td><?php echo ($v["lable"]); ?></td>
					<td ><?php echo ($v["img"]); ?></td>
					<td><?php echo ($v["time"]); ?></td>
					<td>
						<a href="<?php echo U('List/edit',array('id'=>$v['id'],'cid'=>$v['cid'],'p'=>$p));?>" class="act-edit">修改</a>
						&nbsp;&nbsp;&nbsp;<a href="#" class="act-del" data-id="<?php echo ($v["id"]); ?>">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="pagelist"><?php echo ($list["pagelist"]); ?></div>


<form method="post" id="form">
	<input type="hidden" name="id" id="target_id">
</form>


<script>
	//下拉菜单跳转
	$("#category").change(function(){
		var url = "<?php echo U('List/index',array('cid'=>'_ID_'));?>";
		location.href = url.replace("_ID_",$(this).val());
	});

	//删除
	$(".act-del").click(function(){
		if(confirm('确定要删除吗？')){
			$("#target_id").val($(this).attr("data-id"));
			$("#form").attr("action","<?php echo U('List/del',array('p'=>$p,'cid'=>$cid));?>").submit();
		}
	});
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