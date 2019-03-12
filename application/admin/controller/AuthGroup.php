<?php
namespace app\admin\controller;

use think\Db;
use app\admin\model\AuthGroup as AuthGroupModel;
class AuthGroup extends Base
{
   
    public function lst()
    {
    	$authGroupRes = AuthGroupModel::paginate(2);
    	$this->assign('authGroupRes',$authGroupRes);
        return $this->fetch();
    }
	public function add()
    {
    	$authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
    	if(request()->isAjax()){
    		$data = input('post.');
    		if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
    		$add = db('auth_group')->insert($data);
    		if($add){
    			$this->success('添加用户组成功','lst');
    		}else{
    			$this->error('添加用户组失败');
    		}
    	}
    	
        return $this->fetch();
    }
	public function edit(){
		$authgroups=db('auth_group')->find(input('id'));
        $this->assign('authgroups',$authgroups);
       	$authRule=new \app\admin\model\AuthRule();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        if(request()->isAjax()){
            $data=input('post.');
            if($data['rules']){
                $data['rules']=implode(',', $data['rules']);
            }
            $_data=array();
            foreach ($data as $k => $v) {
                $_data[]=$k;
            }
            if(!in_array('status', $_data)){
                $data['status']=0;
            }
            $save=db('auth_group')->update($data);
            if($save!==false){
                $this->success('修改用户组成功！',url('lst'));
            }else{
                $this->error('修改用户组失败！');
            }
            return;
        }
        
        return view();
    }

   
    public function del(){
            $del=db('auth_group')->delete(input('id'));
            
            $this->redirect('lst');
            
    }
   
   
}

?>