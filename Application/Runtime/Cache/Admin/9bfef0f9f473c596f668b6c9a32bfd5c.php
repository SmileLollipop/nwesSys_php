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
				<div class="item"><div class="item-title">分类列表</div>

<div class="top-button">
    <span>相关操作：</span>
    <!--添加分类模态框控制button-->
    <a class="btn btn-warning" id="addBtn" data-toggle="modal" href="#addModal">
        添加分类
    </a>
</div>

<!--新闻分类列表-->
<div class="panel panel-default  category-panel">
    <div class="panel-body">
        <table class="table table-striped category-table">
            <thead>
            <tr>
                <th style="width:10%">序号</th>
                <th style="width:50%">分类名称</th>
                <th style="width:40%">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php $num=1;?>
            <?php if(is_array($category)): foreach($category as $key=>$v): ?><tr>
                    <th scope="row"><?php echo($num++);?></th>
                    <td><?php echo ($v["name"]); ?></td>
                    <td>
                        <a href="#editModal" class="act-edit" data-id="<?php echo ($v["id"]); ?>" data-toggle="modal" data-whatever="<?php echo ($v["name"]); ?>">修改</a>
                        &nbsp;&nbsp;&nbsp;<a href="#" class="act-del" data-id="<?php echo ($v["id"]); ?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!--添加分类模态框-->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">新闻分类添加</h4>
            </div>
            <form action="<?php echo U('Category/add');?>" method="post" class="form-horizontal ca-form">
                <div class="modal-body">
                    <label>分类名称：</label>
                    <input type="text" name="name" value=" ">
                    <span class="tip"><?php echo ($success); ?></span>
                    <?php if(isset($add_error['name'])): ?><span class="tip"><?php echo ($add_error["name"]); ?></span><?php endif; ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" value="添加分类">
                    <input type="submit" class="btn btn-default" name="return" value="取消">
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--修改分类模态框-->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">新闻分类修改</h4>
            </div>
            <form action="<?php echo U('Category/edit');?>" id="edit-form" method="post" class="form-horizontal ca-form">
                <input type="hidden" name="edit-id" id="edit-id">

                <div class="modal-body">
                    <label>分类名称：</label>
                    <input type="text" name="name" value="">
                    <?php if(isset($edit_error['name'])): ?><span class="tip"><?php echo ($edit_error["name"]); ?></span><?php endif; ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" name="id" value="修改分类">
                    <input type="submit" class="btn btn-default" name="return" value="取消">
                </div>
            </form>
            <?php echo ($id); ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<form method="post" id="form">
    <input type="hidden" name="id" id="target_id">
</form>

<!-- 验证输入状态-->
<?php if(isset($add_error)||isset($success)): ?><script type="text/javascript">
        $(function () {
            $('#addModal').modal('show');
        });
    </script><?php endif; ?>

<?php if(isset($edit_error)): ?><script type="text/javascript">
        $(function () {
            $('#editModal').modal('show');
        });
    </script><?php endif; ?>

<script>

    //修改模态框，自动填充原分类名称
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var modal = $(this);
        modal.find('.modal-body input').val(recipient)
    });

    //修改
    $(".act-edit").click(function () {

        $("#edit-id").val($(this).attr("data-id"));

    });

    //删除
    $(".act-del").click(function () {

        if (confirm('确定要删除吗?')) {
            $("#target_id").val($(this).attr("data-id"));
            $("#form").attr("action", "<?php echo U('Category/del');?>").submit();
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