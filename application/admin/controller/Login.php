<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\captcha\Captcha;
use think\Controller;
use app\admin\model\Admin;
class Login extends controller
{
    public function login(){
        return view();
    }
    public function tologin(){
        $username = input('username');
        $password = input('password');
        $captcha = new Captcha();
        if ($captcha->check(input('vercode'))){
            $user= AdminModel::where('username','=',$username)->find();
            if($user){
                if($user['password'] == md5($password)){
                    if ($user['status'] == 1){
                        // 赋值（当前作用域）
                        session('username',$user['username']);
                        session('id',$user['id'] );
                        $token = self::generateToken();
                        if(input('remember')  == "on"){
                            cookie('username',null);
                            cookie('token',null);
                            cookie('username',$username,3600*24*7);
                            cookie('token',$token,3600*24*7);
                            cookie('department',$user['department'],3600*24*7);
                            $user->token = $token;
                            $user->save();
                        }else{
                            cookie('username',null);
                            cookie('token',null);
                            cookie('username',$username);
                            cookie('token',$token);
                            cookie('department',$user['department']);
                            $user->token = $token;
                            $user->save();
                        }
                        return [
                            "code"=>0,
                            "msg"=>"登录成功",
                            "data"=>[
                                "access_token"=>$token
                            ]
                        ];
                    }
                    else{
                        //管理员禁用
                        return[
                            "code"=>-1,
                            "msg"=>"此管理员处于禁用状态，请联系管理者",
                        ];
                    }
                }else{
                    //密码错误
                    return[
                        "code"=>-1,
                        "msg"=>"用户名或密码错误",
                    ];
                }
            }else{
                //用户不存在
                return[
                    "code"=>-1,
                    "msg"=>"用户名或密码错误",
                ];
            }
        }else{
            //验证码错误
            return[
                "code"=>-1,
                "msg"=>"验证码错误",
            ];
        }
    }
    public function logout(){
        session(null);
        cookie('username',null);
        cookie('token',null);
        $this->redirect('Login/login');
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
