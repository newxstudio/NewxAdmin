<?php
namespace app\admin\controller;
use app\admin\model\AuthRule as AuthRuleModel;
use think\facade\Request;

class AuthRule extends Base
{
    public function getRuleData(){
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        return [
            "code" => 0,
            "msg" => "",
            "data" => $authRuleRes
        ];

    }
    public function role(){
        return view();
    }
    public function addroleform(){
            $data=input('post.');
            $plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            if(!key_exists('visibility',$data)){
                $data['visibility'] = 0;
            }else{
                $data['visibility'] = 1;
            }
            if($plevel){
                $data['level']=$plevel['level'] + 1;
            }else{
                $data['level'] = 0;
            }
            $add=db('auth_rule')->insert($data);
            if($add){
                $this->success('添加权限成功！',url('lst'));
            }else{
                $this->error('添加权限失败！');
            }
            return [
                "code" => 0,
                "msg" => "添加规则成功",
                "data" => ""
            ];

    }

    public function roleform(){
        $authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $this->assign('authRuleRes',$authRuleRes);
        return view();
    }

    public function editroleform(){
    	$authRule=new AuthRuleModel();
        $authRuleRes=$authRule->authRuleTree();
        $id = Request::param('id');
        $authRules=$authRule->find($id);
        $this->assign(array(
            'authRuleRes'=>$authRuleRes,
            'authRules'=>$authRules,
            ));
        return view();
    }
    public function editroleformdata(){
            $data=input('post.');

            $id = Request::param('id');
            $data['id'] = $id;
            if(!key_exists('visibility',$data)){
                $data['visibility'] = 0;
            }else{
                $data['visibility'] = 1;
            }
            $save=db('auth_rule')->update($data);
            if($save!==false){
                return [
                    "code" => 0,
                    "msg" => "修改规则成功",
                    "data" => ""
                ];
            }else{
                return [
                    "code" => -1,
                    "msg" => "修改规则失败",
                    "data" => ""
                ];
            }
    }

    public function del(){
        $authRule=new AuthRuleModel();
        $id = Request::param('id');
        $authRule->getparentid($id);
        $authRuleIds=$authRule->getchilrenid($id);
        $authRuleIds[]=$id;
        $del= AuthRuleModel::destroy($authRuleIds);
        if($del){
            return [
                "code" => 0,
                "msg" => "删除规则成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "删除规则失败",
                "data" => ""
            ];
        }

    }



    
    




   

	












}
