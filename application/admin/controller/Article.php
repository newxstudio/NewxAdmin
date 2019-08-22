<?php
namespace app\admin\controller;

use think\Db;
use app\admin\model\Article as ArticleModel;
class Article extends Base
{
   
    public function lst()
    {
    	//$list = ArticleModel::paginate(3);
		// 把分页数据赋值给模板变量list
	
		
		
		$list = db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')
		->paginate(3);
		$this->assign('list', $list);
        return $this->fetch();
    }
	public function add()
    {
    	if(request()->isPost()){
    		
    		$data=[
    		
    			'title'=>input('title'),
    			'author'=>input('author'),
    			'keywords'=>str_replace('，',',',input('keywords')) ,
    			'desca'=>input('desca'),
    			'editorValue'=>input('editorValue'),
    			'cateid'=>input('cateid'),
    			'time'=>time(),
    		];
    		if(input('state') == 'on'){
    			$data['state'] = 1;
    		}
    		if($_FILES['pic']['tmp_name']){
    			$file = request()->file('pic');
    			$info = $file->move( 'static/uploads');
    			$data['pic'] =  'uploads/'.$info->getSaveName();
    			
    		}
    		$validate = new \app\admin\validate\Article;

	        if (!$validate->scene('add')->check($data)) {
	        	$this->error($validate->getError());
	            die();
	        }
    		if(Db::name('article')->insert($data)){
    			return $this->success('添加文章成功！','lst');
    		}else{
    			return $this->error('添加文章失败！');
    		}
    	}
    	$cateres = db('cate')->select();
    	$this->assign("cateres",$cateres);
        return $this->fetch();
    }
	public function edit()
    {
    	$id = input('id');
    	$articles= db('article')->find($id);
    	if(request()->isPost())
    	{
    		$data = [
    		    'id'=>input('id'),
    			'title'=>input('title'),
    			'author'=>input('author'),
    			'keywords'=>str_replace('，',',',input('keywords')) ,
    			'desca'=>input('desca'),
    			'editorValue'=>input('editorValue'),
    			'cateid'=>input('cateid'),
    			
    		
    		];
    		
    		if(input('state') == 'on'){
    			$data['state'] = 1;
    		}else{
    			$data['state'] = 0;
    		}
    		
    		if($_FILES['pic']['tmp_name']){
    			//@unlink(SITE_URL.'/public/static/'.$articles['pic']);
    			
    			$file = request()->file('pic');
    			$info = $file->move( 'static/uploads');
    			$data['pic'] =  'uploads/'.$info->getSaveName();
    			
    		}
    		
    		
    		$validate = new \app\admin\validate\Article;

	        if (!$validate->scene('edit')->check($data)) {
	        	$this->error($validate->getError());
	            die();
	        }
    		
    		if(db('article')->update($data))
    		{
    			$this->success('修改文章成功！','lst');
    		}else{
    			$this->error('修改文章失败！');
    		}
    		return;
    	}
    	$cateres = db('cate')->select();
    	$this->assign("cateres",$cateres);
    	$this->assign('articles',$articles);
        return $this->fetch();
    }
   
   public function del()
   {
   	
   		$id = input('id');
   		
   		if(db('article')->delete($id))
   		{
   			$this->success("删除文章成功",'links/lst');
   		}else{
   			$this->error("删除文章失败");
   		}
   }
   
   
}

?>