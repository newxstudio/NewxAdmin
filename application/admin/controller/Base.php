<?php

namespace app\admin\controller;

use app\admin\model\Image;
use Qiniu\Storage\UploadManager;
use think\Controller;

class Base extends Controller
{
    public function initialize()
    {
        if (cookie('username')) {
            $res = db('admin')->where('token', cookie('token'))->find();
            $this->assign('admin', $res);
        } else {
            $res = 0;
        }
        if (!$res) {
            $this->redirect('Login/login');
        }
//        $auth = new Auth();
//        $request = request();
//        $con = $request->controller();
//        $action = $request->action();
//        $name = $con . '/' . $action;
//        $notCheck = array('Admin/edit1');
//        if (!in_array($name, $notCheck)) {
//            if (!$auth->check($name, session('id'))) {
//                return [
//                    "code" => -1,
//                    "msg" => "没有权限",
//                    "data" => ""
//                ];
//            }
//        }
    }

    public static function image()
    {
        if (empty($_FILES['file']['tmp_name'])) {
            return [
                "code" => -1,
                "msg" => "上传图片失败",
                "data" => ""
            ];
        }
        //要上传的文件
        $file = $_FILES['file']['tmp_name'];
        $ext = explode('.', $_FILES['file']['name']);
        $ext = $ext[1];
        //构建鉴权对象
        $auth = new \Qiniu\Auth(config('qiniu.ak'), config('qiniu.sk'));
        //生成token
        $token = $auth->uploadToken(config('qiniu.bucket'));
        //上传到七牛云后保存的文件名
        $key = date('Y') . "/" . date('m') . "/" . substr(md5($file), 0, 5) . date('YmdHis')
            . rand(0, 9999) . '.' . $ext;
        $uploadMgr = new UploadManager();
        list($res, $err) = $uploadMgr->putFile($token, $key, $file);
        if ($err != null) {
            return null;
        } else {
            return $key;
        }
    }

    public static function getRandChar($length)
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
