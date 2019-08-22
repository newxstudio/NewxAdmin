<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\model\AuthGroup as AuthGroupModel;
use think\facade\Request;

class Admin extends Base
{
	
    public function adminlist()
    {
    	$auth=new Auth();
        $admin=new AdminModel();
        $adminres=$admin->getadmin();
        
        foreach ($adminres as $k => $v) {
            $_groupTitle=$auth->getGroups($v['id']);
           
            $groupTitle=$_groupTitle[0]['title'];
            $v['groupTitle']=$groupTitle;
        }
        $authGroupRes = AuthGroupModel::select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('adminres',$adminres);
        return view();
    }
    public function getadmindata()
    {
        $auth=new Auth();
        $adminres = AdminModel::all();
        foreach ($adminres as $k => $v) {
            $_groupTitle=$auth->getGroups($v['id']);

            $groupTitle=$_groupTitle[0]['title'];
            $v['groupTitle']=$groupTitle;
        }
        return [
            "code" => 0,
            "msg" => "",
            "data" => $adminres
        ];
    }
    public function adminform(){
        $authGroupRes = AuthGroupModel::select();
        $this->assign('authGroupRes',$authGroupRes);
        return view();
    }
	public function addadmin()
    {
        $post = input('post.');
        $data=[
            'username'=>$post['username'],
            'password'=>md5($post['password']),
            'email'=>$post['email'],
            'desca'=>$post['desca'],
            'department' => $post['department'],
            'name'=>$post['name'],
        ];
        if(!key_exists('status',$post)){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $access = [
            'group_id'=>$post['group_id'],
        ];
        $admin = new AdminModel();
        $res = $admin->save($data);
        if($res){
            $user = db('admin')->where('username',input('username'))->select();
            $access['uid'] = $user[0]['id'];
            if(db('auth_group_access')->insert($access)){
                return [
                    "code" => 0,
                    "msg" => "添加管理员成功",
                    "data" => ""
                ];
            }
        }else{
            return [
                "code" => -1,
                "msg" => "添加管理员失败",
                "data" => ""
            ];
        }
    }

    public function editadminform()
    {
        $id = Request::param('id');
        $admins = db('admin')->find($id);
        $authGroupAccess=db('auth_group_access')->where(array('uid'=>$id))->find();
        $authGroupRes=db('auth_group')->select();
        $this->assign('authGroupRes',$authGroupRes);
        $this->assign('admins',$admins);
        $this->assign('groupId',$authGroupAccess['group_id']);
        return view();
    }
    public function editadmindata()
    {
        $id = Request::param('id');
        $admins = db('admin')->find($id);
        $post = input('post.');
        $data = [
            'email'=>$post['email'],
            'desca'=>$post['desca'],
            'department' => $post['department'],
            'name'=>$post['name'],
        ];
        if(!key_exists('status',$post)){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $access = [
            'group_id'=>$post['group_id'],
        ];
        if($post['password'])
        {
            $data['password'] = md5($post['password']);
        }else{
            $data['password'] = $admins['password'];
        }
        $admin = AdminModel::get($id);
        $res = $admin->save($data);
        if($res){
            $result = db('auth_group_access')->where('uid',$id)->update($access);
            if ($result){
                return [
                    "code" => 0,
                    "msg" => "修改管理员成功",
                    "data" => ""
                ];
            }
        }else{
            return [
                "code" => -1,
                "msg" => "修改管理员失败",
                "data" => ""
            ];
        }
    }

   public function del()
   {
   		$id = Request::param('id');
   		$adminRes = AdminModel::destroy($id);
   		$acessRes = db('auth_group_access')->where('uid',$id)->delete();
   		if($adminRes && $acessRes)
   		{
   			return [
                "code" => 0,
                "msg" => "删除管理员成功",
                "data" => ""
            ];
   		}else{
            return [
                "code" => -1,
                "msg" => "删除管理员失败",
                "data" => ""
            ];
        }
   }
   public function logout(){
   		session(null);
   		$this->redirect('login/index');
   }
}

?>