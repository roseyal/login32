<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	 <style>  
            .pages a,  
            .pages span {  
                display: inline-block;  
                padding: 2px 5px;  
                margin: 0 1px;  
                border: 1px solid #f0f0f0;  
                -webkit-border-radius: 3px;  
                -moz-border-radius: 3px;  
                border-radius: 3px;  
            }  
              
            .pages a,  
            .pages li {  
                display: inline-block;  
                list-style: none;  
                text-decoration: none;  
                color: #58A0D3;  
            }  
              
            .pages a.first,  
            .pages a.prev,  
            .pages a.next,  
            .pages a.end {  
                margin: 0;  
            }  
              
            .pages a:hover {  
                border-color: #50A8E6;  
            }  
              
            .pages span.current {  
                background: #50A8E6;  
                color: #FFF;  
                font-weight: 700;  
                border-color: #50A8E6;  
            }  
        </style>  
	<style>
    .pager span {
        background: #8FC41F;
        color: #fff;
        border: 1px solid #8FC41F;
        padding: 3px 10px;
        margin-left: 8px;
    }
    .pager a {
        border: 1px solid #666666;
        padding: 3px 10px;
        margin-left: 8px;
        text-decoration: none;
        color: #333;
        outline: none;
    }
</style>
</head>
<body>
<?php if(is_array($list)): foreach($list as $key=>$data): ?><div style=" float: left;">
姓名： <span><?php echo ($data["username"]); ?></span>
</div>
<div style=" float: left; margin-left:30px;">
身份证号： <span><?php echo ($data["idcate"]); ?></span>
</div>
<div style=" margin-left:30px;">
手机号： <span><?php echo ($data["stutel"]); ?></span>
</div><?php endforeach; endif; ?>
<ul class="paginList pager"><!-- 分页显示 --><?php echo ($page); ?></ul>
 <div class="pages" style="margin-left: 400px">  
            <?php echo ($page); ?>  
        </div>  
</body>
</html>