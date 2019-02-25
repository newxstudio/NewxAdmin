<?php
namespace app\index\controller;
/**
 *引入并继承think\Controller才可以使用fetch进行视图渲染 
 */
use think\Controller;
class Index extends Controller
{
    public function index()
    {
    	return $this->fetch();//指向application/index/view/index/index.html
    }
}
