<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
class User extends Model
{
   
    public function login($data){
    	$captcha = new Captcha();
		if( !$captcha->check($data['code']))
		{
			return 4;
		}
    	$user = Db::name('user')->where('username','=',$data['username'])->find();
    	if($user){
    		if($user['password'] == md5($data['password']))
    		{
    			// 赋值（当前作用域）
				session('username',$user['username'] );
				session('uid',$user['id'] );
    			return 3;
    		}else{
    			return 2;
    		}
    	}else{
    		return 1;//用户不存在
    	}
    }
   
}

?>