<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
<div></div>
 <div class="">
  <p class="top15 captcha" id="captcha-container">  
      <input id="j_verify" onblur="getVal(this.j_verify)" name="verify" width="50%" height="50" class="captcha-text" placeholder="验证码" type="text">    
      <img alt="验证码" src="<?php echo U('home/login/verify',array());?>" title="点击刷新">  
    </p>  
 </div>
 <script>

// alert(verify_img);
// $('#verify_img').click(function(){
// 	var verify_imgs=$('#verify_img').attr('src');
// 	//alert(verify_imgs);
// 	$(this).attr("src", verify_imgs+'&random='+Math.random());
// })

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
	if(Ename=='')
	{
		alert(111);
	}
	$.ajax({
		url:'<?php echo U('login/do_verify');?>',
		type:'POST',
		data:{names:Ename},
		success:function(result){
			if(result){
				alert('输入正确');
			}else{
				alert('验证码错误');
			}
		},
		error:function(){
			alert('未知错误');
		}
	})
 });
 </script>
</body>
</html>