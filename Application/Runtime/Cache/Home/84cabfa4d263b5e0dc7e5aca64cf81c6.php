<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>文件上传</title>
	<meta charset="utf-8">
</head>
<body>
<div>
<form action="/index.php/Home/Login/upload" method="post" enctype="multipart/form-data">
<input type="file" name="file" />上传文件
<input type="submit" value="提交" >
</form>
</div>
</body>
</html>