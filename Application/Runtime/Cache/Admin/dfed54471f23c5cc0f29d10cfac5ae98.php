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
<?php if(isset($success)): ?><div class="message">修改成功!</div><?php endif; ?>
<!--<?php if(isset($error)): ?><div class="message">修改失败!</div><?php endif; ?>-->

<form method="post" class="ca-form">
	<input  type="text" name="id" value="<?php echo ($id); ?>">
	<!--type="hidden"-->
	<div class="container">
		<div class="form-group ">
			<label>分类名称：</label><input type="text" name="name" value="<?php echo ($name); ?>" required>
		</div>
		<div class="form-group twoBtn">
			<input type="submit" class="btn btn-default" name="return" value="修改分类">
			<input type="reset" class="btn btn-default"  value="重新填写">
		</div>
	</div>
</form>
</body>
</html>