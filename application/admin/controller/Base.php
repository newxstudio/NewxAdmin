<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public function initialize(){
        if(!session('username')){
            $this->error('请先登录系统！','Login/index');
        }
        $auth=new Auth();
        $request=request();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Index/index','Admin/edit1','Base/initialize','Admin/logout','Apply/data','Common/left','Apply/search','Apply/select1');
        if(session('id')!=1){
       		if(!in_array($name, $notCheck)){
         		if(!$auth->check($name,session('id'))){
		    	 	$this->error('没有权限',url('index/index')); 
		    	 }
         	}
        	
        }
        $flag = (!$auth->check($name,session('id')));
		if(session('id')==1){
       		$flag = 1;
        }
        $this->assign('auth',$flag);
        $_groupTitle=$auth->getGroups(session('id'));
        //dump($_groupTitle);
       	$groupRules= array();
        $groupRules=explode(",",$_groupTitle[0]['rules']);
        sort($groupRules);
        //dump($groupRules);
        $itemRes = array();
        foreach ($groupRules as $k => $v) {
            $itemRes[$k] = db('auth_rule')->where('id',$v)->find();
            
        }
        $this->assign("itemRes",$itemRes);
        //dump($itemRes);
    }
}
