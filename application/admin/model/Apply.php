<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
use think\model\concern\SoftDelete;

class Apply extends Model
{
    use SoftDelete;
     public function user()
    {
        return $this->belongsTo('user','uid');
    }
   
}

?>