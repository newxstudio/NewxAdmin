<?php
namespace app\admin\controller;

use think\Db;
use app\admin\model\AuthGroup as AuthGroupModel;
use think\facade\Request;

class AuthGroup extends Base
{

    public function rulegroupdata()
    {
    	$authGroupRes = AuthGroupModel::select();
    	return [
            "code" => 0,
            "msg" => "",
            "data" => $authGroupRes
        ];
    }
    public function rulegroup()
    {
        return view();
    }
    public function addrulegroup()
    {
        $authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }
	public function addrulegroupdata()
    {
    		$data = input('post.');
    		if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            if(!key_exists('status',$data)){
                $data['status'] = 0;
            }else{
                $data['status'] = 1;
            }
    		$add = db('auth_group')->insert($data);
    		if($add){
                return [
                    "code" => 0,
                    "msg" => "添加用户组成功",
                    "data" => ""
                ];
    		}else{
                return [
                    "code" => -1,
                    "msg" => "添加用户组失败",
                    "data" => ""
                ];
    		}
        return view();
    }
	public function editrulegroup(){
		$authgroups=db('auth_group')->find(input('id'));
        $this->assign('authgroups',$authgroups);
       	$authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }
    public function editrulegroupdata(){
        $id = Request::param('id');
        $data=input('post.');
        $data['id'] = $id;
        if(!key_exists('rules',$data)){
            $data['rules']=implode(',', array());
        }else{
            $data['rules']=implode(',', $data['rules']);
        }
        if(!key_exists('status',$data)){
            $data['status'] = 0;
        }else{
            $data['status'] = 1;
        }
        $save=db('auth_group')->update($data);
        if($save!==false){
            return [
                "code" => 0,
                "msg" => "修改用户组成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "修改用户组失败",
                "data" => ""
            ];
        }
    }

   
    public function del(){
        $id = Request::param('id');
        $del=db('auth_group')->delete($id);
        if($del!==false){
            return [
                "code" => 0,
                "msg" => "删除用户组成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "删除用户组失败",
                "data" => ""
            ];
        }
            
    }
   
   
}

?>