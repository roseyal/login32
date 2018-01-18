<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="en" class="no-js">

<head>

<meta charset="UTF-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge"> 

<meta name="viewport" content="width=device-width, initial-scale=1"> 

<title>login</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="/Public/js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/demo.css" />

<!--必要样式-->

<link rel="stylesheet" type="text/css" href="/Public/css/component.css" />

<!--[if IE]>

<script src="js/html5.js"></script>

<![endif]-->
<style type="text/css">
.input_outer img{
	 height:45px;
	 width:110px;
	 border-radius: 45px;
	 margin-left: 211px;
}
</style>

</head>

<body>

		<div class="container demo-1">

			<div class="content">

				<div id="large-header" class="large-header">

					<canvas id="demo-canvas"></canvas>

					<div class="logo_box">

						<h3>欢迎注册</h3>

						<form id="formdata" method="post">
							<div class="input_outer">

								<span class="u_user"></span>

								<input name="username" id="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" msg="用户名">

							</div>

							<div class="input_outer">

								<span class="us_uer"></span>

								<input name="password" id="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="password" placeholder="请输入密码">

							</div>
							<div class="input_outer">

								<span class="us_uer"></span>

								<input id="passwordRepeat" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="password" placeholder="请确认密码">

							</div>
							<div>
								<input name="checks" value="1" type="checkbox"><span style="padding-left: 10px;">点击10天之内免登录</span>
								<a href="<?php echo U('login/zhuce');?>" style="color: #ccc; margin-left: 100px">登录</a>

							</div>
							<div class="mb2"><a class="act-but submit" style="color: #FFFFFF">
							<input id="buttons" type="button" value="注册" onclick="return checkNull()" style="background-color: #0096e6;border: none;color: #FFFFFF;" /></a></div>

						</form>

					</div>

				</div>

			</div>

		</div><!-- /container -->
		<script>
$('#buttons').click(function(){
	var name=$('#name').val();
	var names=/[\w_\-\u4e00-\u9fa5]+/;
	if(!names.test(name))
	{
	 	layer.msg('用户名格式不对', {
                          time: 1500 
                        }); 
		return false;
	}
	var password=$('#password').val();
	var passwordRepeat=$('#passwordRepeat').val();
	if(password=='' || passwordRepeat=='')
	{
		layer.msg('密码不能为空', {
                          time: 1500 
                        }); 
		return false;
	}
	if(password != passwordRepeat)
	{
		layer.msg('两次密码不一致', {
                          time: 1500 
                        }); 
		return false;
	}
	$.ajax({
		url:'<?php echo U('login/do_zhuce');?>',
		type:'POST',
		data:$('#formdata').serialize(),
		success:function(result){
			if(result.static){
				layer.msg(result.msg, {
                        icon: 1,
                        time: 1500 
                    }, function(){
                        location.href="http://www.tp32login.com/home/login/index";
                    	}); 
					}else{
						layer.msg(result.msg,{
							time:1500
				});
			}
		},
		error:function(){
 						layer.msg('未知错误', {
                          icon: 2,
                          time: 1500 
                        }); 
		}
	})
})
</script>
		<script src="/Public/js/TweenLite.min.js"></script>

		<script src="/Public/js/EasePack.min.js"></script>

		<script src="/Public/js/rAF.js"></script>

		<script src="/Public/js/demo-1.js"></script>

	</body>
</html>