<?php
namespace app\admin\validate;
use think\Validate;
	class Article extends Validate
	{
		
	    protected $rule =   [
	        'title'  => 'require',
	        'cateid'  => 'require',
	       
	       
	    ];
	    
	    protected $message  =   [
	        'title.require' => '文章标题必须填写',
	       
	        'cateid.require' => '请选择所属栏目',
	        
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['title','cateid']);
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->only(['username','cateid']);
    	}   
    	
	    
	}

?>