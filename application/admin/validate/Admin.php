<?php
namespace app\admin\validate;
use think\Validate;
	class Admin extends Validate
	{
	    protected $rule =   [
	        'username'  => 'require|unique:admin',
	        'password'  => 'require',
	        'name'      => 'require',
	       
	    ];
	    
	    protected $message  =   [
	        'username.require' => '管理员名称必须填写',
	        'username.unique'  => '管理员名称不得重复',
	        'password.require' => '管理员密码必须填写',
	        'name.require'     => '管理员昵称必须填写'
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['username','password'])->remove('username','min');//认真看手册，不能加min:25
        	
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->remove('username','require')->remove('password','require')->remove('name','require');
    	}    
	    
	}

?>