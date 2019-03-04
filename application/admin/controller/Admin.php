<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
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
    	if(request()->isPost()){
    		
    		$data=[
    			'username'=>input('username'),
    			'password'=>md5(input('password')),
    			'email'=>input('email'),
    			'desca'=>input('desca'),
    			'name'=>input('name'),
    		];
    		$access = [
    			'group_id'=>input('group_id'),
    		];
    		
    		if($_FILES['pic']['tmp_name']){
    			$file = request()->file('pic');
    			$info = $file->move( 'static/uploads');
    			
    			$data['pic'] =  'uploads/'.$info->getSaveName();
    			
    		}
    		
    		$validate = new \app\admin\validate\Admin;

	        if (!$validate->scene('add')->check($data)) {
	        	$this->error($validate->getError());
	            die();
	        }
	       
    		if(Db::name('admin')->insert($data)){
    			$user = db('admin')->where('username',input('username'))->select();
    			$access['uid'] = $user[0]['id'];
    			if(db('auth_group_access')->insert($access)){
    				return $this->success('添加管理员成功！','lst');
    			}
    			
    		}else{
    			return $this->error('添加管理员失败！');
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
    	if(request()->isPost())
    	{
    		$data = [
    			'id'=>input('id'),
    			'email'=>input('email'),
    			'desca'=>input('desca'),
    			'name'=>input('name'),
    		
    		];
    		$access = [
    			
    			'group_id'=>input('group_id'),
    		];
    		if(input('password'))
    		{
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $admins['password'];
    		}
    		
    		if($_FILES['pic']['tmp_name']){
    			$file = request()->file('pic');
    			$info = $file->move( 'static/uploads');
    			$data['pic'] =  'uploads/'.$info->getSaveName();
    			
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
    			
    			return $this->success('修改管理员成功！','lst');
    			
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return;
    	}
    	$authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
    	$authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
    	$this->assign('admins',$admins);
    	$this->assign('groupId',$authGroupAccess['group_id']);
        return $this->fetch();
    }
	public function edit1()
    {
    	$id = input('id');
    	$admins = db('admin')->find($id);
    	if(request()->isPost())
    	{
    		$data = [
    			'id'=>input('id'),
    			'email'=>input('email'),
    			'desca'=>input('desca'),
    			'name'=>input('name'),
    		
    		];
    		$access = [
    			
    			'group_id'=>input('group_id'),
    		];
    		if(input('password'))
    		{
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $admins['password'];
    		}
    		
    		if($_FILES['pic']['tmp_name']){
    			$file = request()->file('pic');
    			$info = $file->move( 'static/uploads');
    			$data['pic'] =  'uploads/'.$info->getSaveName();
    			
    		}
    		$validate = new \app\admin\validate\Admin;

	        if (!$validate->scene('edit')->check($data)) {
	        	$this->error($validate->getError());
	            die();
	        }
    		$save = db('admin')->update($data);
    		
    		if($save !== false)
    		{
    			
    			return $this->success('修改管理员成功！','index/index');
    			
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
   		if($id != 1)
   		{
   			if(db('admin')->delete($id))
   			{
   				$this->success("删除管理员成功",'admin/lst');
   			}else{
   				$this->error("删除管理员失败");
   			}
   		}else{
   			$this->error("初始管理员不可删除");
   		}
   	
   	
   }
   public function logout(){
   		session(null);
   		$this->redirect('login/index');
   }
}

?>