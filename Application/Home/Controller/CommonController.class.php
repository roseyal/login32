<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize()
    {
    	session('users',cookie('users'));
    	if(session('users')=='' && session('username')==''){
    		$this->redirect('Login/index');
    	}

    }
}
?>