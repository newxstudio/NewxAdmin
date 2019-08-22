<?php
namespace app\admin\validate;
use think\Validate;
	class Links extends Validate
	{
	    protected $rule =   [
	        'title'  => 'require',
	        'url'  => 'require',
	       
	       
	    ];
	    
	    protected $message  =   [
	        'username.require' => '链接名称必须填写',
	       
	        'password.require' => '链接地址必须填写',
	        
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['title','url']);
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->only(['username'])->remove('username','min');
    	}    
	    
	}

?>