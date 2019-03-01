<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\model\User as UserModel;
use think\captcha;
class User extends Base
{

    public function lst()
    {
    	$list = UserModel::paginate(5);
		// 把分页数据赋值给模板变量list
		$this->assign('list', $list);
        return $this->fetch();
    }
    public function signin()
    {
    	if(request()->isPost()){
    		
    		$data=[
    			'username'=>input('username'),
    			'password'=>md5(input('password')),
    			'name'=>input('name'),
    			'sex'=>input('sex'),
    			'date'=>input('date'),
    			'phone'=>input('phone'),
    			'department'=>input('department'),
    			'class'=>input('class'),
    			'id_number'=>input('id_number'),
    			'bedroom'=>input('bedroom'),
    			'email'=>input('email'),
    			
    		];
    		
    		if(Db::name('user')->insert($data)){
    			return $this->success('注册成功！','lst');
    		}else{
    			return $this->error('注册失败！');
    		}
    	}
        return $this->fetch();
    }
	public function add()
    {
    	if(request()->isPost()){
    		
    		$data=[
    			'username'=>input('username'),
    			'password'=>input('password'),
    			'email'=>input('email'),
    			'desca'=>input('desca'),
    			'name'=>input('name'),
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
    			return $this->success('添加管理员成功！','lst');
    		}else{
    			return $this->error('添加管理员失败！');
    		}
    	}
        return $this->fetch();
    }
	public function edit()
    {
    	$id = input('id');
    	$users = db('user')->find($id);
    	if(request()->isPost())
    	{
    		$data = [
    			'id'=>input('id'),
    			'username'=>input('username'),
    			'password'=>input('password'),
    			'name'=>input('name'),
    			'sex'=>input('sex'),
    			'date'=>input('date'),
    			'phone'=>input('phone'),
    			'department'=>input('department'),
    			'class'=>input('class'),
    			'id_number'=>input('id_number'),
    			'bedroom'=>input('bedroom'),
    			'email'=>input('email'),
    		
    		];
    		if(input('password'))
    		{
    			$data['password'] = md5(input('password'));
    		}else{
    			$data['password'] = $admins['password'];
    		}
    		
    		$save = db('user')->update($data);
    		
    		if($save !== false)
    		{
    			$this->success('修改管理员成功！','lst');
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return;
    	}
    	
    	$this->assign('users',$users);
        return $this->fetch();
    }
   
   public function del()
   {
   	
   		$id = input('id');
   		
   		if(db('user')->delete($id))
   		{
   			$this->success("删除用户成功",'user/lst');
   		}else{
   			$this->error("删除用户失败");
   		}
   		
   	
   }
   public function logout(){
   		session(null);
   		$this->success('退出成功!','login/index');
   }
}

?>