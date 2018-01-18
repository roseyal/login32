<?php
namespace Home\Controller;
use Home\Controller\CommonController;

class IndexController extends CommonController {
    public function index(){
    	//print_r(session());
    	$info=M('users')->page($_GET['p'].',10')->select();
    	$this->assign('list',$info);
  		$count=M('users')->count();        //查询总记录数
  		$page=new \Think\Page($count,10);  //实例化分页类，传入总记录和每页显示几条
      $page->lastSuffix=false;
      $page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;&nbsp;&nbsp;&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
      $page->setConfig('prev','上一页');
      $page->setConfig('next','下一页');
      $page->setConfig('last','末页');
      $page->setConfig('first','首页');
      $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
  		$show=$page->show();               //分页显示输出
  		$this->assign('page',$show);
    	$this->display('index');		
    }
}