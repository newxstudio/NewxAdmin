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
   public function data()
    {
    	$count1=['视频部', '采风部', '图文部', '网站部', '办公室', '运营部', '采编部'];
    	$data[]=array();
    	for($i = 0; $i < count($count1); $i++){
    		$data[$i] = db('apply')->where('volunteer1','=',$count1[$i])->count();
    	}
    	for($i = 7; $i < 14; $i++){
    		$data[$i] = db('apply')->where('volunteer2','=',$count1[$i-7])->count();
    	}
    	for($i = 14; $i < 21; $i++){
    		
    		$data[$i] = ApplyModel::hasWhere('user', ['sex'=>'男'])->where('volunteer1','=',$count1[$i-14])->count();
    		
    	}
    	for($i = 21; $i < 28; $i++){
    		
    		$data[$i] = ApplyModel::hasWhere('user', ['sex'=>'女'])->where('volunteer1','=',$count1[$i-21])->count();
    	}
    	for($i = 28; $i < 35; $i++){
    		
    		$data[$i] = ApplyModel::hasWhere('user', ['sex'=>'男'])->where('volunteer2','=',$count1[$i-28])->count();
    		
    	}
    	for($i = 35; $i < 42; $i++){
    		
    		$data[$i] = ApplyModel::hasWhere('user', ['sex'=>'女'])->where('volunteer2','=',$count1[$i-35])->count();
    	}
    	//dump($data);
    	return json($data);
    	/*
    	$list = db('apply')->where('')
		// 把分页数据赋值给模板变量list
		$this->assign('list', $list);
		
        return $this->fetch();
        */
    }
   public function chart()
    {
    	
    
        return $this->fetch();
        
    }
    
  
}

?>