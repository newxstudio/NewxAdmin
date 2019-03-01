<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use app\admin\model\Apply as ApplyModel;
use think\captcha;
class Apply extends Base
{

    public function lst()
    {
    	$list = ApplyModel::paginate(5);
		// 把分页数据赋值给模板变量list
		$this->assign('list', $list);
		
        return $this->fetch();
    }
	
	public function search()
    {
    	$id = input('id');
		$apply = ApplyModel::select($id);
    	$this->assign('apply', $apply);
    	
        return $this->fetch();
        
    }
	public function select1()
    {
    	if(request()->isGet()){
    		
			$volunteer1 = (string)$_GET['department1'];
    	 	$volunteer2 = (string)$_GET['department2'];
    		
    		if($volunteer1 == null && $volunteer2 == null){
    			$result = ApplyModel::paginate(5,false, [
    	 			'query' =>  request()->param(),
    	 			'$volunteer1' => (string)$_GET['department1'],
    	 			'$volunteer2' => (string)$_GET['department2'],
    	 		]);
    			$this->assign('list', $result);
         		return $this->fetch('lst');
    		}
    		else if($volunteer1 == null){
    			$map[] = ['volunteer2','=',(string)$volunteer2];
    		}
    		else if($volunteer2 == null){
    			$map[] = ['volunteer1','=',(string)$volunteer1];
    		}
    		else{
    			$map[] = ['volunteer1','=',(string)$volunteer1];
    			$map[] = ['volunteer2','=',(string)$volunteer2];
    		}
    	
    	 	
    	 //$apply = new ApplyModel();
    	 //$reslut = $apply->where($map)->paginate(2);
    	 $result = ApplyModel::where($map)->paginate(5,false, [
    	 	'query' =>  request()->param(),
    	 	'$volunteer1' => (string)$_GET['department1'],
    	 	'$volunteer2' => (string)$_GET['department2'],
    	 ]);
    	 $this->assign('list', $result);
		
         return $this->fetch('lst');
    	
       }
    }
   
   public function del()
   {
   	
   		$id = input('id');
   		if (db('apply')->delete($id)) {
			$code['msg'] = '删除成功';
			$code['error'] = '200';
		} else {
			$code['msg'] = '删除失败';
			$code['error'] = '400';
		}
		
		
		return $this->redirect('apply/lst');
   }
  
}

?>