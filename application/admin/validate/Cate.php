<?php
namespace app\admin\validate;
use think\Validate;
	class Cate extends Validate
	{
		
	    protected $rule =   [
	        'catename'  => 'require|max:25|unique:cate',
	      
	       
	    ];
	    
	    protected $message  =   [
	        'catename.require' => '栏目名称必须填写',
	        'catename.unique' => '栏目名称不得重复',
	        'catename.max' => '栏目名称最多不超过25个字符',
	      
	        
	    ];
	     // add 验证场景定义
    	public function sceneAdd()
    	{
    		return $this->only(['catename'])->remove('catename','max');//认真看手册，不能加min:25
        	
    	}    
	     // edit 验证场景定义
    	public function sceneEdit()
    	{
    		return $this->only(['catename'])->remove('catename','max');
    	}   
    	
	    
	}

?>