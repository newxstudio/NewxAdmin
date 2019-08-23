<?php

namespace app\admin\controller;
use app\admin\model\News as NewsModel;
use think\facade\Request;

class News extends Base
{
    public function newslist(){
        return view();
    }

    public function newslistdata(){
        $news = new NewsModel();
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


    public function addnews(){
        return view();
    }

    public function editnews(){
        return view();
    }
}