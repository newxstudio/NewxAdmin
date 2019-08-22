<?php
namespace app\admin\controller;
use app\admin\model\Apply as ApplyModel;
use app\admin\model\Email;
use think\facade\Request;

class Apply extends Base
{

    /*
     * uid：用户id
     * name:姓名
     * sex:0代表男，1代表女
     * class:专业班级(类似012三个数字)
     * student_id:学号
     * qq:qq号
     * phone:手机号
     * apartment:寝室
     * email:邮箱
     * option1:第一志愿
     * option2:第二志愿
     * allow_adjust：0代表不服从，1代表服从
     * profile:个人简介
     * specialty:特长及经历
     * recognize：对竞选岗位的认识和看法
     * */
    public function addapply(){
        $data = Request::param('');
        $apply = new ApplyModel();
        $res = $apply->save($data);
        if ($res){
            return [
                'code' => 0,
                'msg' => '提交报名表成功',
                'data'=> ''
            ];
        }else{
            return [
                'code' => -1,
                'msg' => '提交报名表失败',
                'data'=> ''
            ];
        }
    }
    public function searchapply(){
        $uid = Request::param('uid');
        $res = ApplyModel::where('uid','=',$uid)->select();
        if($res){
            return [
                'code' => 0,
                'msg' => '查询报名表成功，已返回报名表数据',
                'data'=> $res
            ];
        }else{
            return [
                'code' => -1,
                'msg' => '查询报名表失败，报名表尚未提交',
                'data'=> $res
            ];
        }
    }
    public function editapply(){
        $data = Request::param('');
        $editTime = ApplyModel::get($data['id'])->editTime;
        if($editTime < 2){
            $res = ApplyModel::update($data);
            if ($res){
                $apply1 = ApplyModel::get($data['id']);
                $apply1->editTime = $apply1->editTime + 1;
                $res1 = $apply1->save();
                if($res1){
                    return [
                        'code' => 0,
                        'msg' => '修改报名表成功',
                        'data'=> ''
                    ];
                }
            }else{
                return [
                    'code' => -1,
                    'msg' => '修改报名表失败，提交失败',
                    'data'=> ''
                ];
            }
        }else{
            return [
                'code' => -1,
                'msg' => '修改报名表失败，修改次数已达上限(2次)',
                'data'=> ''
            ];
        }

    }
    public function status(){
        $uid = Request::param('uid');
        $res = ApplyModel::where('uid','=',$uid)->select();
        if($res){
            $data['addmit_department'] = $res[0]['addmit_department'];
            $data['status'] = $res[0]['status'];
            return [
                'code' => 0,
                'msg' => '查询录取状态成功',
                'data'=> $data
            ];
        }else{
            return [
                'code' => -1,
                'msg' => '查录取状态失败，报名表尚未提交',
                'data'=> ''
            ];
        }
    }
    public function applylist()
    {
        return view();
    }
    public function manageapply(){
        return view();
    }
    public function showoptionapply(){
        $option_type = Request::param('option_type'); // 1代表option1，2代表option2
        $option_num = Request::param('option_num');
        if ($option_type == 1){
            $list = ApplyModel::where('option1','=',$option_num)->select();
        }else{
            $list = ApplyModel::where('option2','=',$option_num)->select();
        }
        $this->assign('list',$list);
        return view();
    }
    public function showoptiondata(){
        //获取Apply对象实例
        $apply = new ApplyModel();
        $name = Request::param('name');
        $sex = Request::param('sex');
        $status = Request::param('status');
        $option_type = Request::param('option_type'); // 1代表option1，2代表option2
        $option_num = Request::param('option_num');
        if ($option_type == 1){
            $apply = $apply->where('option1','=',$option_num);
        }else{
            $apply = $apply->where('option2','=',$option_num);
        }
        if ($name != ''){
            $apply = $apply->whereLike("name","%".$name."%",'and');
        }
        if($sex != ''){
            $apply = $apply->where('sex','=',$sex);
        }
        if($status != ''){
            $apply = $apply->where('status','=',$status);
        }
        //获取每页显示的条数
        $limit= Request::param('limit');
        //获取当前页码
        $page= Request::param('page');
        //limit的起始位置
        $start=($page-1)*$limit;
        // 查询出当前页数显示的数据
        $res = $apply->order('create_time desc')
            ->limit("$start,$limit")
            ->select();
        return [
            "code" => 0,
            "msg" => "",
            "count" => $apply->count(),
            "data" => $res
        ];
    }
    public function showapply(){
        $id = Request::param('id');
        $apply = ApplyModel::get($id);
        $this->assign('apply',$apply);
        return view();
    }
    public function applylistalldata(){
        //获取Apply对象实例
        $apply = new ApplyModel();
        $name = Request::param('name');
        $sex = Request::param('sex');
        $status = Request::param('status');
        $option1 = Request::param('option1');
        $option2 = Request::param('option2');
        if ($name != ''){
            $apply = $apply->whereLike("name","%".$name."%",'and');
        }
        if($sex != ''){
            $apply = $apply->where('sex','=',$sex);
        }
        if($status != ''){
            $apply = $apply->where('status','=',$status);
        }
        if ($option1 != ''){
            $apply = $apply->where('option1','=',$option1);
        }
        if ($option2 != ''){
            $apply = $apply->where('option2','=',$option2);
        }
        //获取每页显示的条数
        $limit= Request::param('limit');
        //获取当前页码
        $page= Request::param('page');
        //limit的起始位置
        $start=($page-1)*$limit;
        // 查询出当前页数显示的数据
        $res = $apply->order('create_time desc')
            ->limit("$start,$limit")
            ->select();
        return [
            "code" => 0,
            "msg" => "",
            "count" => $apply->count(),
            "data" => $res
        ];
    }
   public function changeStatus(){
        $id = Request::param('id');
        $statusTo = Request::param('statusTo');
        $department = Request::param('department');

        $apply = ApplyModel::get($id);
        if($statusTo == 1){
            $department = 0;
        }
        $apply->addmit_department = $department;
        $apply->status = $statusTo;
        $res = $apply->save();
        if($res){
            return [
                "code" => 0,
                "msg" => "修改状态成功",
                "data" => ""
            ];
        }else{
            return [
                "code" => -1,
                "msg" => "修改状态失败",
                "data" => ""
            ];
        }
   }

   public function data(){
        $option1_data = array();
        $option2_data = array();
        for ($i = 1;$i <= 6; $i++){
           $res = ApplyModel::where('option1','=',$i)->count();
           array_push($option1_data,$res);
        }
       for ($i = 1;$i <= 6; $i++){
           $res = ApplyModel::where('option2','=',$i)->count();
           array_push($option2_data,$res);
       }
       $this->assign('option1_data',$option1_data);
       $this->assign('option2_data',$option2_data);
       return view();
   }

   public function echartdata(){
       $option1_count = array();
       $option2_count = array();
       $option1_boy = array();
       $option2_boy = array();
       $option1_girl = array();
       $option2_girl = array();
       for ($i = 1;$i <= 6; $i++){
           $res = ApplyModel::where('option1','=',$i)->count();
           $boy_count = ApplyModel::where('option1','=',$i)->where('sex','=',0)->count();
           array_push($option1_count,$res);
           array_push($option1_girl,$res - $boy_count);
           array_push($option1_boy,$boy_count);
       }
       for ($i = 1;$i <= 6; $i++){
           $res = ApplyModel::where('option2','=',$i)->count();
           $boy_count = ApplyModel::where('option2','=',$i)->where('sex','=',0)->count();
           array_push($option2_count,$res);
           array_push($option2_girl,$res - $boy_count);
           array_push($option2_boy,$boy_count);
       }
       $option1_data['count'] = $option1_count;
       $option1_data['boy'] = $option1_boy;
       $option1_data['girl'] = $option1_girl;
       $option2_data['count'] = $option2_count;
       $option2_data['boy'] = $option2_boy;
       $option2_data['girl'] = $option2_girl;
       return [
           'option1_data'=>$option1_data,
           'option2_data'=>$option2_data
       ];

   }

   public function mail(){
        return view();
   }

    public function showmail(){
        //获取Apply对象实例
        $apply = new ApplyModel();
        $status = Request::param('status');
        $option_num = Request::param('option_num');
        if ($status == 1){
            $res = $apply->where('option1','=',$option_num)->select();
        }else{
            $res = $apply->where('addmit_department','=',$option_num)->where('status','=',$status)->select();
        }

        return [
            "code" => 0,
            "msg" => "",
            "data" => $res
        ];
    }

    public function sendmail(){
        $option_num = Request::param('option_num');
        $status = Request::param('status');
        $subject = Request::param('subject');
        $content = Request::param('text');
        if ($status == 1){
            $email_array = ApplyModel::where('option1','=',$option_num)->field('email')->limit(3)->select();
        }else{
            $email_array = ApplyModel::where('addmit_department','=',$option_num)->where('status','=',$status)->field('email')->select();
        }
        foreach ($email_array as $email){
            $email_list[] = $email['email'];
        }
        $res_array = Mail::send($email_list, $subject,$content);
        $email = new Email();
        $email->department = $option_num;
        $email->status = $status;
        $email->content = json_encode($res_array);
        $result = $email->save();
        if($result){
            return [
                "code" => 0,
                "msg" => "",
                "data" => $email->id
            ];
        }
    }
    public function emailstatus(){
        $id = Request::param('id');
        $this->assign('id',$id);
        return view();
    }
    public function emailstatusdata(){
        $id = Request::param('id');
        $res = Email::where('id','=',$id)
            ->field('content')
            ->select();
        if($res){
            return [
                "code" => 0,
                "msg" => "",
                "data" => json_decode($res[0]['content'])
            ];
        }
    }
  
}

