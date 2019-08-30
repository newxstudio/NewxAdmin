<?php

namespace app\admin\controller;
use app\admin\model\Admin;

class Set extends Base
{
    public function info(){
        $username = cookie('username');
        if($username){
            $admin = Admin::where('username',$username)->find();
        }
        $this->assign('admin',$admin);
        return view();
    }
    public function password(){
        $username = cookie('username');
        if($username){
            $admin = Admin::where('username',$username)->find();
        }
        $this->assign('admin',$admin);
        return view();
    }
    public function editInfo(){
        $name = input('name');
        $email = input('email');
        $desca =  input('desca');
        $username = cookie('username');
        if($username){
            $admin = Admin::where('username',$username)->find();
            $admin->name = $name;
            $admin->email = $email;
            $admin->desca = $desca;
            $res = $admin->save();
            if ($res){
                return [
                    'code'=>0,
                    'msg'=>"修改成功"
                ];
            }else{
                return [
                    'code'=>-1,
                    'msg'=>"修改失败(不能与原来一致)"
                ];
            }
        }
    }
    public function editPassword(){
        $oldPassword = input('oldPassword');
        $newPassword = input('password');
        $username = cookie('username');
        if($username){
            $admin = Admin::where('username',$username)->find();
            if (!($admin->password === md5($oldPassword))){
                return [
                    'code'=>-1,
                    'msg'=>"密码输入错误，请重新输入"
                ];
            }
            $admin->password = md5($newPassword);
            $res = $admin->save();
            if ($res){
                return [
                    'code'=>0,
                    'msg'=>"修改成功"
                ];
            }else{
                return [
                    'code'=>-1,
                    'msg'=>"修改失败(新密码不能与旧密码一致)"
                ];
            }
        }
    }
}