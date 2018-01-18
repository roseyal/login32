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

						<h3>欢迎登录</h3>

						<form id="forms" onsubmit="return false" method="post">
							<div class="input_outer">

								<span class="u_user"></span>

								<input name="username" id="users" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" msg="用户名">

							</div>

							<div class="input_outer">

								<span class="us_uer"></span>

								<input name="password" id="pass" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="password" placeholder="请输入密码">

							</div>
							<div class="input_outer" id="captcha-container">

								<span class="us_uer"></span>

								<input id="j_verify" name="file" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" type="text" placeholder="验证码" msg="验证码">
								 <img alt="验证码" src="<?php echo U('home/login/verify',array());?>" title="点击刷新">  

							</div>
							<div>
								<input name="checks" value="1" type="checkbox"><span style="padding-left: 10px;">点击10天之内免登录</span>
								<a href="<?php echo U('login/zhuce');?>" style="color: #ccc; margin-left: 100px">注册</a>

							</div>
							<div class="mb2"><a class="act-but submit" style="color: #FFFFFF">
							<input id="sub" type="submit" value="登录" onclick="return checkNull()" style="background-color: #0096e6;border: none;color: #FFFFFF;" /></a></div>

						</form>

					</div>

				</div>

			</div>

		</div><!-- /container -->
		<script>
			var captcha_img = $('#captcha-container').find('img')  
			var verifyimg = captcha_img.attr("src");  
			captcha_img.click(function(){  
			    if( verifyimg.indexOf('?')>0){  
			        $(this).attr("src", verifyimg+'&random='+Math.random());  
			    }else{  
			        $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
			    }  
			}); 
			$('#forms').submit(function(){
				var users=$('#users').val();
				if(users=='')
				{
					layer.msg('请输入用户名',{time:1500});
					return false;
				};
				var pass=$('#pass').val();
				if(pass==''){
					layer.msg('请输入密码',{time:1500});
					return false;
				};
				var Ename=$('#j_verify').val();
				if(Ename=='')
				{
					layer.msg('请输入验证码',{time:1500});
					return false;
				};
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
                         	location.href="http://www.tp32login.com/home/index/index";
                    		}); 
						}else{
							layer.msg(result.msg,{
								time:1500
							});
						}
					},
					error:function(){
						layer.msg('未知错误',{
								time:1500
							});
					}
				});

			});
		</script>
		<!-- <script>
			var captcha_img = $('#captcha-container').find('img')  
			var verifyimg = captcha_img.attr("src");  
			captcha_img.click(function(){  
			    if( verifyimg.indexOf('?')>0){  
			        $(this).attr("src", verifyimg+'&random='+Math.random());  
			    }else{  
			        $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
			    }  
			}); 
			$("#j_verify").blur(function() {
			var Ename=$(this).val();
			$.ajax({
				url:'<?php echo U('login/do_verify');?>',
				type:'POST',
				data:{names:Ename},
				success:function(result){
					if(result){
					}else{
						layer.msg('验证码错误',{time:1500});
						}
					}
				},
				error:function(){
					alert('未知错误');
				}
			})
		 });
		</script> -->
		<script src="/Public/js/TweenLite.min.js"></script>

		<script src="/Public/js/EasePack.min.js"></script>

		<script src="/Public/js/rAF.js"></script>

		<script src="/Public/js/demo-1.js"></script>
		<!-- 判断所有是否为空 -->
		<!-- <script type="text/javascript">  
		    function checkNull()  
		    {  
		         var num=0;  
		         var str="";  
		         $("input[type$='text']").each(function(n){  
		              if($(this).val()=="")  
		              {  
		                   num++;  
		                   str+="?"+$(this).attr("msg")+"不能为空！\r\n";  
		              }  
		         });  
		         if(num>0)  
		         {  
		              layer.msg(str,{time:1500});
		              return false;  
		         }  
		         else  
		         {  
		              return true;  
		         }  
		    }    
    	</script>   -->
	</body>
</html>