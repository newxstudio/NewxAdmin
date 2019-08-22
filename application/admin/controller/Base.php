<?php
namespace app\admin\controller;
use app\admin\model\Image;
use think\Controller;
class Base extends Controller
{
    public function aainitialize(){
        if(!session('username')){
            $this->redirect('Login/index');
        }
        $adminsPic = db('admin')->find(session('id'));
        $this->assign("adminsPic",$adminsPic);
        $auth=new Auth();
        $request=request();
        $con=$request->controller();
        $action=$request->action();
        $name=$con.'/'.$action;
        $notCheck=array('Admin/edit1');
        
       		if(!in_array($name, $notCheck)){
         		if(!$auth->check($name,session('id'))){
         			$flag = 0;
		    	 	$this->error('没有权限',url('index/index')); 
		    	 }else{
		    	 	$flag = 1;
		    	 }
         	}
        $flag = (!$auth->check($name,session('id')));
		if(session('id')==1){
       		$flag = 1;
        }
        
        
        $_groupTitle=$auth->getGroups(session('id'));
        //dump($_groupTitle);
        
        if($_groupTitle[0]["group_id"] == 3){
        	$flag = 0;
        }
        
        $this->assign('auth',$flag);
        
       	$groupRules= array();
        $groupRules=explode(",",$_groupTitle[0]['rules']);
        sort($groupRules);
        //dump($groupRules);
        $itemRes = array();
        foreach ($groupRules as $k => $v) {
            $itemRes[$k] = db('auth_rule')->where('id',$v)->find();
            
        }
        
        $this->assign("itemRes",$itemRes);
        $this->assign("groupTitle",$_groupTitle[0]["title"]);
        
    }

    public function upload($name, $path)
    {
        //根据name属性获取file属性
        $img = request()->file($name);
        // 移动到框架应用根目录/public/uploads/$path 目录下
        $info = $img->move('static/uploads/'.$path);
        $url = 'static/uploads/'.$path . $info->getSaveName();
        $img = new Image();
        $img->url = $url;
        $res = $img->save();
        if($info && $res){
            // 成功上传后 获取上传信息
            return [
                'code' => 0,
                'msg' => '上传成功!',
                'url' => 'static/uploads/'.$path . $info->getSaveName()
            ];
        }else{
            // 上传失败获取错误信息
            return [
                'code' => -1,
                'msg' => $img->getError(),
                'url' => ''
            ];
        }
    }
    public  static  function getRandChar($length)
    {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0;
             $i < $length;
             $i++) {
            $str .= $strPol[rand(0, $max)];
        }

        return $str;
    }
    // 生成令牌
    public static function generateToken()
    {
        $randChar = self::getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = 'GJUHMkojsojsnafftswiwiwDEDeqfshqs12445627672ksoksow';
        return md5($randChar . $timestamp . $tokenSalt);
    }
}
