<?php
namespace app\admin\validate;
use think\Validate;
	class Tags extends Validate
	{
	    protected $rule =   [
	        'tagname'  => 'require|unique:tags',
	        'id'=>'require',
	       
	       
	    ];
	    
	    protected $message  =   [
	        'tagname.require' => 'tags标题必须填写',
	       
	        
	        
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['tagname']);
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->only(['tagname','id']);
    	}    
	    
	}

?>