<?php
namespace app\admin\controller;
class Index extends Base
{
    public function index()
    {
        $auth=new Auth();
        $_groupTitle=$auth->getGroups(session('id'));
        $groupRules= array();
        $groupRules=explode(",",$_groupTitle[0]['rules']);
        $itemRes = array();
        foreach ($groupRules as $k => $v) {
            $itemRes[$k] = db('auth_rule')->where('id',$v)->find();
        }
        $this->assign("itemRes",$itemRes);
        return view();
    }
    public function show(){
        return view();
    }
}