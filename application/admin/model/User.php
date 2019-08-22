<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\captcha\Captcha;
use think\model\concern\SoftDelete;

class User extends Model
{
    use SoftDelete;
    public function apply()
    {
        return $this->hasOne('Apply','pid');
    }
   
   
}

?>