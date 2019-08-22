<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends controller
{
   
    public function index()
    {
    	
    	if(request()->isAjax()){
    		$admin = new Admin();
    		$data = input('post.');
    		if($admin->login($data)==3)
    		{
    			$this->success("信息正确",'index/index');
    			
    		}elseif($admin->login($data)==4){
    			$this->error('验证码错误');
    		}
    		else{
    			$this->error('用户名或密码错误');
    		}
    	}
        return $this->fetch('login');
        
    }
	
   
   
}

?>