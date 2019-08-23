<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

use think\captcha;
class Common extends Base
{

    public function left()
    {
    	$auth=new Auth();
        $_groupTitle=$auth->getGroups(session('id'));
        //dump($_groupTitle);
       	$groupRules= array();
        $groupRules=explode(",",$_groupTitle[0]['rules']);
        dump($groupRules);
        $itemRes = array();
        foreach ($groupRules as $k => $v) {
            $itemRes[$k] = db('auth_rule')->where('id',$v)->find();
            
        }
        $this->assign("itemRes",$itemRes);
        dump($itemRes);

        
    }
}
