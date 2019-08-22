<?php
namespace app\admin\model;
use think\Model;
use think\model\concern\SoftDelete;

class Article extends Model
{
    use SoftDelete;
    public function cate(){
    	return $this->belongsTo('cate','cateid');
    }
   
}

?>