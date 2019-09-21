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
    	return view();//指向application/index/view/index/index.html
    }
	public function introduce()
	{
		return view();//指向application/index/view/index/introduce.html
	}
}
