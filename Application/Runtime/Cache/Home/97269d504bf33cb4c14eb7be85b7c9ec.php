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

</head>

<body>

		<div class="container demo-1">

			<div class="content">

				<div id="large-header" class="large-header">

					<canvas id="demo-canvas"></canvas>

					<div class="logo_box">

						<h3>欢迎登录</h3>

						<form id="forms" onsubmit="return false" method="post">
							<div class="input_outer">

								<span class="u_user"></span>

								<input name="username" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">

							</div>

							<div class="input_outer">

								<span class="us_uer"></span>

								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="password" placeholder="请输入密码">

							</div>
							<div>
								<input name="checks" value="1" type="checkbox"><span style="padding-left: 10px;">点击10天之内免登录</span>

							</div>
							<div class="mb2"><a class="act-but submit" style="color: #FFFFFF">
							<input id="sub" type="submit" value="登录" style="background-color: #0096e6;border: none;color: #FFFFFF;" /></a></div>

						</form>

					</div>

				</div>

			</div>

		</div><!-- /container -->
		<script>
			$('#forms').submit(function(){
				$.ajax({
					url:'<?php echo U('login/do_login');?>',
					type:'POST',
					data:$('#forms').serialize(),
					success:function(result){
						if(result.static){
							layer.msg(result.msg, {
                          		icon: 1,
                          		time: 1500 
                        	}, function(){
                         	location.href="/home/index/index";
                    		}); 
						}else{
							layer.msg(result.msg,{
								icon:2,
								time:1500
							});
						}
					},
					error:function(){
						layer.msg('密码错误',{
								icon:2,
								time:1500
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