<?php

namespace app\admin\controller;
use app\admin\model\News as NewsModel;
use think\facade\Request;

class News extends Base
{
    public $url = "";
    public function newslist(){
        return view();
    }

    public function newslistdata(){
        $news = new NewsModel();
        $title = Request::param('title');
        $time = Request::param('time');
        if ($title != ''){
            $news = $news->whereLike("title","%".$title."%",'and');
        }
        if($time != ''){
            $news = $news->whereTime('create_time','-'.$time.' days');
        }
        //获取每页显示的条数
        $limit= Request::param('limit');
        //获取当前页码
        $page= Request::param('page');
        //limit的起始位置
        $start=($page-1)*$limit;
        // 查询出当前页数显示的数据
        $res = $news->order('create_time desc')
            ->limit("$start,$limit")
            ->select();
        return [
            "code" => 0,
            "msg" => "",
            "count" => $news->count(),
            "data" => $res
        ];
    }
    //上传到七牛云 -- 缩略图
    public function upload(){
        $image = self::image();
        $data['src'] = config('qiniu.image_url') . '/' . $image;
        return [
            "code" => 0,
            "msg" => "上传图片成功",
            "data" => $data
        ];
    }

    //上传到七牛云 -- 文章图
    public function textupload(){
        $image = self::image();
        return [
            "link" => config('qiniu.image_url') . '/' . $image
        ];
    }


    public function addnews(){
        return view();
    }

    public function editnews(){
        $id = Request::param('id');
        $news = NewsModel::get($id);
        $this->assign('news',$news);
        return view();
    }

    public function delnewsdata(){
        $id = Request::param('id');
        $res = NewsModel::destroy($id);
        if ($res){
            return [
                "code" => 0,
                "msg" => "删除新闻成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "删除新闻失败",
                "data" => ""
            ];
        }

    }
    public function addnewsdata(){
        $data = Request::param('');
        $news = new NewsModel();
        $res = $news->save($data);
        if ($res){
            return [
                "code" => 0,
                "msg" => "添加新闻成功",
                "data" => ""
            ];
        }
    }

    public function editnewsdata(){
        $id = Request::param('id');
        $data = Request::param('');
        $news = NewsModel::get($id);
        if($data['img'] == ''){
            $data['img'] = $news['img'];
        }
        $res = $news->save($data);
        if ($res){
            return [
                "code" => 0,
                "msg" => "编辑新闻成功",
                "data" => ""
            ];
        }
    }

}