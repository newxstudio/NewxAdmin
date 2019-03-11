<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public function initialize(){
        if(!session('username')){
            $this->redirect('Login/index');
        }
        $auth=new Auth();
        $request=request();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Admin/edit1');
        if(session('id')!=1){
       		if(!in_array($name, $notCheck)){
         		if(!$auth->check($name,session('id'))){
         			$flag = 0;
		    	 	$this->error('没有权限',url('index/index')); 
		    	 }else{
		    	 	$flag = 1;
		    	 }
         	}
        	
        }
       
        $flag = (!$auth->check($name,session('id')));
		if(session('id')==1){
       		$flag = 1;
        }
        
        
        $_groupTitle=$auth->getGroups(session('id'));
        //dump($_groupTitle);
        
        if($_groupTitle[0]["group_id"] == 3){
        	$flag = 0;
        }
        
        $this->assign('auth',$flag);
        
       	$groupRules= array();
        $groupRules=explode(",",$_groupTitle[0]['rules']);
        sort($groupRules);
        //dump($groupRules);
        $itemRes = array();
        foreach ($groupRules as $k => $v) {
            $itemRes[$k] = db('auth_rule')->where('id',$v)->find();
            
        }
        
        $this->assign("itemRes",$itemRes);
        $this->assign("groupTitle",$_groupTitle[0]["title"]);
        
    }
}
