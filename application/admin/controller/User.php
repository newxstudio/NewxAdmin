<?php

namespace app\admin\controller;

use app\admin\model\User as UserModel;
use think\Db;
use think\facade\Request;

class User extends Base
{
    /*
     * username:学号
     * password:密码
     * */
    public function signin()
    {
        $data = Request::param('');
        $username = $data['username'];
        $userSearch = UserModel::where('username','=',$username)->find();
        if(!$userSearch){
            $password = md5($data['password']);
            $user = new UserModel();
            $user->username = $username;
            $user->password = $password;
            $res = $user->save();
            if($res){
                return [
                    'code' => 0,
                    'msg' => '注册成功',
                    'data'=> ''
                ];
            }
        }else{
            return [
                'code' => -1,
                'msg' => '该学号已被注册，若非本人注册，请联系管理员',
                'data'=> ''
            ];
        }


    }
    public function login()
    {
        $data = Request::param('');
        $user = Db::name('user')->where('username','=',$data['username'])->find();
        if($user){
            if($user['password'] == md5($data['password']))
            {
                // 赋值（当前作用域）
                session('username',$user['username'] );
                session('id',$user['id'] );
                $token = self::generateToken();
                $user1 = UserModel::get($user['id']);
                $user1->token = $token;
                $res = $user1->save();
                if($res){
                    return [
                        'code' => 1,
                        'msg' => '信息正确，登陆成功',
                        'data'=> [
                            'token'=> $token
                        ]
                    ];
                }
            }else{
                return [
                    'code' => 2,
                    'msg' => '用户名或密码错误',
                    'data'=> ''
                ];
            }
        }else{
            return [
                'code' => 3,
                'msg' => '用户不存在，请先注册',
                'data'=> ''
            ];
        }
    }
    public function logout()
    {
        session(null);
        $this->success('退出成功!', 'login/index');
    }

}

