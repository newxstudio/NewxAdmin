<?php

namespace app\admin\model;
use think\Model;
use think\model\concern\SoftDelete;

class BaseModel extends Model
{
    use SoftDelete;
    protected $hidden = ['delete_time'];
    protected function  prefixImgUrl($value, $data){
        $finalUrl = $value;
        $finalUrl = "http://localhost/newxadmin/public/static/".$value;

        return $finalUrl;
    }
}