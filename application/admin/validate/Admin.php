<?php
namespace app\admin\validate;
use think\Validate;
	class Admin extends Validate
	{
	    protected $rule =   [
	        'username'  => 'require|unique:admin',
	        'password'  => 'require',
	        'name'      => 'require',
	        'email'  => 'require',
	        'desca'      => 'require',
	       	'pic'      =>'require',
	    ];
	    
	    protected $message  =   [
	        'username.require' => '管理员登录名称必须填写',
	        'username.unique'  => '管理员名称不得重复',
	        'password.require' => '管理员密码必须填写',
	        'name.require'     => '管理员昵称必须填写',
	        'email.require' => '管理员邮箱必须填写',
	        'desca.require'     => '管理员描述必须填写',
	        'pic.require'     => '请上传图片',
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['username','password','name','email','desca','pic']);
        	
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->remove('username','require')->remove('password','require')->remove('name','require');
    	}    
	    
	}

?>