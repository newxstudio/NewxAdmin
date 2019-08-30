<?php

namespace app\admin\controller;
use app\admin\model\Carousel as CarouselModel;
use think\facade\Request;

class Carousel extends Base
{
    public function carousellist(){
        return view();
    }
    public function carouseldata(){
        $res = CarouselModel::all();
        return [
            "code" => 0,
            "msg" => "返回轮播图数据成功",
            "data" => $res
        ];
    }
    public function delcarousel(){
        $id = Request::param('id');
        $res = CarouselModel::destroy($id);
        if ($res){
            return [
                "code" => 0,
                "msg" => "删除轮播图成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "删除轮播图失败",
                "data" => ""
            ];
        }

    }

    //上传到七牛云
    public function upload(){
        $image = self::image();
        if($image){
            $carou = new CarouselModel();
            $carou->url = config('qiniu.image_url').'/'.$image;
            $res = $carou->save();
            if ($res){
                return [
                    "code" => 0,
                    "msg" => "上传图片成功",
                    "data" => config('qiniu.image_url').'/'.$image
                ];
            }
        }else{
            return [
                "code" => -1,
                "msg" => "上传图片失败",
                "data" => ""
            ];
        }
    }

}