<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>添加新闻分类</title>
	<link rel="stylesheet" href="/Public/Common/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/Public/Admin/css/style.css"/>
</head>
<body>
	<?php if(isset($success)): ?><div class="message">添加成功!</div><?php endif; ?>
	<?php if(isset($error)): ?><div class="message">添加失败!</div><?php endif; ?>

	<form method="post" class="ca-form">
		<div class="container">
			<div class="form-group ">
				<label>分类名称：</label><input type="text" name="name" required>
			</div>
			<div class="form-group twoBtn">
				<input type="submit" class="btn btn-default" value="添加分类">
				<input type="submit" class="btn btn-default" name="return" value="添加分类并返回">
			</div>
		</div>
	</form>
</body>
</html>