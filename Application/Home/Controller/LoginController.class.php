<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\upload;
class LoginController extends Controller {
    public function index(){
    	//print_r(session());
    	//print_r(cookie());
    	//session('users',cookie('users'));
    	session('users',cookie('users'));
    	if(session('username')=='' && session('users')==''){
    		$this->display('index');
    	}else{
    		 $this->redirect('index/index');
    	}
    }
    public function zhuce(){
        $this->display();
    }
    public function do_zhuce(){
        $data['username']=I('post.username');
        $data['password']=md5(I('post.password'));
        $info=M('user')->where("username='{$data['username']}'")->find();
        if($info)
        {
            $datas=[
                        'msg'=>'用户名已被注册',
                        'static'=>0
                    ];
        }else{
            $info=M('user')->add($data);
            $datas=[
                        'msg'=>'注册成功',
                        'static'=>1
                    ];
        }
        $this->ajaxReturn($datas);
    }
    public function do_login(){
    	// $data=I('post.');
        $verify = new \Think\Verify(); 
        $code=I('post.file');
        $res = $verify->check($code); 
    	$username=I('post.username');
    	$password=md5(I('post.password'));
    	$checks=I('post.checks');
    	//print_r($data);exit();
    	$info=M('user')->where("tel=$username")->find();
    	// print_r($info);exit;
        if($res){
                if($info)
            {
                if($info['password']==$password)
                {
                    session('username',$username);
                    session('uid',$info['Id']);
                    if($checks){
                        cookie('users',$username,3600);
                    }
                    $datas=[
                        'msg'=>'登陆成功',
                        'static'=>1
                    ];
                }else{
                    $datas=[
                        'msg'=>'密码错误',
                        'static'=>0
                    ];

                }
            }else{
                    $datas=[
                        'msg'=>'用户名错误',
                        'static'=>0
                    ];
            }
        }else{
            $datas=[
                        'msg'=>'验证码错误',
                        'static'=>0
                    ];
        }
    	 $this->ajaxReturn($datas);
    }

    public function login(){
    	$this->display();
    }
     public function verify() {
             $config = array(
               'imageH' => 34,
               'seKey'     =>  'ThinkPHP.CN',   // 验证码加密密钥
		       'codeSet'   =>  '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',             // 验证码字符集合
		       'expire'    =>  1800,            // 验证码过期时间（s）
		       'useZh'     =>  false,           // 使用中文验证码 
		       'zhSet'     =>  '此处不粘贴了太多了',              // 中文验证码字符串
		       'useImgBg'  =>  false,           // 使用背景图片 
		       'fontSize'  =>  25,              // 验证码字体大小(px)
		       'useCurve'  =>  false,            // 是否画混淆曲线
		       'useNoise'  =>  false,            // 是否添加杂点    
		       'imageH'    =>  0,               // 验证码图片高度
		       'imageW'    =>  0,               // 验证码图片宽度
		       'length'    =>  4,               // 验证码位数
		       'fontttf'   =>  '',              // 验证码字体，不设置随机获取
		       'bg'        =>  array(243, 251, 254),  // 背景颜色
		       'reset'     =>  true,           // 验证成功后是否重置
             );
            $Verify = new \Think\Verify($config);
            $Verify->entry();
           }
    public function do_verify()
    {
    	 $code=I('post.names');
         $verify = new \Think\Verify();
         $res = $verify->check($code);
         $this->ajaxReturn($res, 'json');
    }
    public function file(){
    	$this->display();
    }
    public function upload(){
    	//print_r($_FILES);exit;
    	$upload=new \Think\Upload();//实例化上传类
    	$upload->maxSize=3145728;//设置附件上传大小
    	$upload->exts=array('jpg','gif','png','jpeg','txt');
    	$upload->rootPath='./Uploads/';//设置上传根目录
    	$upload->savePath='';//设置附件上传子目录
    	//上传文件
    	//print_r($file);exit;
    	$info=$upload->upload();
    	// print_r($info);exit;
    	if(!$info){
    		$this->error($upload->getError());
    	}else{
    		$this->success('上传成功');
    	}
    }
}