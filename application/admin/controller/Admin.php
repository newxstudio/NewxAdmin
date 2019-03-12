<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\File;
use app\admin\model\Admin as AdminModel;
use think\captcha;
class Admin extends Base
{
	
    public function lst()
    {
    	$auth=new Auth();
        $admin=new AdminModel();
        $adminres=$admin->getadmin();
        
        foreach ($adminres as $k => $v) {
            $_groupTitle=$auth->getGroups($v['id']);
           
            $groupTitle=$_groupTitle[0]['title'];
            $v['groupTitle']=$groupTitle;
        }
        $this->assign('adminres',$adminres);
    	$list = AdminModel::paginate(5);
		
		
        return $this->fetch();
    }
	public function add()
    {
    	if(request()->isAjax()){
    		$post = input('post.');
    		
    		
    		$data=[
    			'username'=>$post['username'],
    			'password'=>md5($post['password']),
    			'email'=>$post['email'],
    			'desca'=>$post['desca'],
    			'name'=>$post['name'],
    			'pic' =>cookie('url'),
    		];
    		$access = [
    			'group_id'=>$post['group_id'],
    		];
    		
    			
    		
    		$validate = new \app\admin\validate\Admin;

	        if (!$validate->scene('add')->check($data)) {
	        	$this->error($validate->getError());
	            die();
	        }
    		
    		if(Db::name('admin')->insert($data)){
    			$user = db('admin')->where('username',input('username'))->select();
    			$access['uid'] = $user[0]['id'];
    			
    			if(db('auth_group_access')->insert($access)){
    				$this->success('添加管理员成功！','lst');
    			}
    			
    		}else{
    			$this->error('添加管理员失败！');
    		}
    		
    	}
    	$authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
       
        return $this->fetch();
    }
	public function edit()
    {
    	$id = input('id');
    	$admins = db('admin')->find($id);
    	$authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
	    $authGroupRes=db('auth_group')->select();
	    $this->assign('authGroupRes',$authGroupRes);
	    $this->assign('admins',$admins);
	    $this->assign('groupId',$authGroupAccess['group_id']);
    	if(request()->isAjax()){
		    
		    $post = input('post.');
		    $id = $post['id'];
		    
		    $data = [
		    	'id'=>$post['id'],
		    	'email'=>$post['email'],
		    	'desca'=>$post['desca'],
		    	'name'=>$post['name'],
		    ];
		    $access = [
		    	'group_id'=>$post['group_id'],
		    ];
		    if($post['password'])
		    {
		    	$data['password'] = md5($post['password']);
		    }else{
		    	$data['password'] = $admins['password'];
		    }
		    
		    if(cookie('url')){
		    	$data['pic'] = cookie('url');
		    }else{
		    	$data['pic'] = $admins['pic'];
		    }
		    $validate = new \app\admin\validate\Admin;
		
			if (!$validate->scene('edit')->check($data)) {
				$this->error($validate->getError());
			    die();
			}
		    $save = db('admin')->update($data);
		    
		    if($save !== false)
		    {
		    	db('auth_group_access')->where('uid',$id)->update($access);
		    	
		    	$this->success('修改管理员成功！','lst');
		    	
		    }else{
		    	$this->error('修改管理员失败！');
		    }
		    
		    
	        
    	}
    	
    	return $this->fetch();
    	
    }
	public function edit1()
    {
    	$id = input('id');
    	$admins = db('admin')->find($id);
    	if(request()->isAjax())
    	{
    		$data = [
    			'id'=>input('id'),
    			'email'=>input('email'),
    			'desca'=>input('desca'),
    			'name'=>input('name'),
    		];
    		
    		if(input('password'))
    		{
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $admins['password'];
    		}
    		if(cookie('url')){
		    	$data['pic'] = cookie('url');
		    }else{
		    	$data['pic'] = $admins['pic'];
		    }
		    
    		$save = db('admin')->update($data);
    		
    		if($save !== false)
    		{
    			$this->success('修改管理员成功！','index/index');
    			
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return;
    	}
    	
    	$this->assign('admins',$admins);
    	
        return $this->fetch();
    }
   
   public function del()
   {
   	
   		$id = input('id');
   		
   		if(db('admin')->delete($id) && db('auth_group_access')->where('uid',$id)->delete())
   		{
   			$this->redirect('admin/lst');
   			
   		}
   		
   	
   	
   }
   public function logout(){
   		session(null);
   		$this->redirect('login/index');
   }
   
   public function upload()
    {
        $img = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $img->move('static/uploads');
        $url = 'uploads/' . $info->getSaveName();
        
        if($info){
        	if(cookie('url')){
        		cookie('url',null);
        	}
        	cookie('url',$url);
        	if(cookie('url')){
            	return json(['code' => 0, 'msg' => '上传成功!', 'url' => 'static/uploads/' . $info->getSaveName()]);
        	}
            // 成功上传后 获取上传信息

        }else{
            // 上传失败获取错误信息
            return json(['code' => 1, 'msg' => $img->getError(), 'url' => '']);
        }
        

	}
	
}

?>