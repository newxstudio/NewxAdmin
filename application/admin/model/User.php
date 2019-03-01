<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
class User extends Model
{
    public function apply()
    {
        return $this->hasOne('Apply','pid');
    }
   
   
}

?>