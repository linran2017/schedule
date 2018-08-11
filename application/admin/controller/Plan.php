<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Plan as PlanModel;
use think\Cookie;

class Plan extends Controller{
    /*
     * 任务列表
     */
    public function index(){
        $data=db('plan')->paginate(5);
        return view('',compact('data'));
    }

    /*
     * 任务添加
     */
    public function store(PlanModel $plan){
        if(request()->isPost()){
            $res=$plan->store(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
        $user=db('user_view')->where('normal',1)->select();
        return view('',compact('user'));
    }

    /*
     * 任务编辑
     */
    public function edit(PlanModel $plan){
        $id=input('param.id');
       $planurl=Cookie::get('planurl');
       if($planurl){
           $url=$planurl;
       }else{
           $url='index';
       }
        if(request()->isPost()){
            $res=$plan->edit(input('post.'));
            if($res['valid']){
                $this->success($res['msg'],$url);
            }else{
                $this->error($res['msg']);
            }
        }
        $oldData=db('plan')->where('id',$id)->find();
        $user=db('user_view')->where('normal',1)->select();
        $userIds=db('user_view')->column('vid');
        return view('',compact('oldData','user','userIds'));
    }

    /*
     * 任务删除
     */
    public function del(planModel $plan){
        $id=input('get.id');
        $res=$plan->del($id);
        if($res['valid']){
            $this->success($res['msg'],'index');
        }
    }
}
