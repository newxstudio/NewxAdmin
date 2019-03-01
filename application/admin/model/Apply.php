<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
class Apply extends Model
{
   
     public function user()
    {
        return $this->belongsTo('user','uid');
    }
   
}

?>