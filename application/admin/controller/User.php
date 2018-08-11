<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\User as UserModel;
use think\Cookie;

class User extends Controller{
    /*
     * 员工列表
     */
    public function index(){
        $data=db('user_view')->paginate(5);
        //halt($data);
        return view('',compact('data'));
    }

    /*
     * 员工添加
     */
    public function store(UserModel $user){
        if(request()->isPost()){
            $res=$user->store(input('post.'));
            if ($res['valid']){
                $this->success($res['msg'],'index');
            }else{
                $this->error($res['msg']);
            }
        }
        return view('');
    }

    /*
     * 员工编辑
     */
    public function edit(UserModel $user){
        //员工编号
        $id=input('param.id');
        $planurl=Cookie::get('userurl');
        if($planurl){
            $url=$planurl;
        }else{
            $url='index';
        }
        if(request()->isPost()){
            $res=$user->edit(input('post.'));
            if ($res['valid']){
                $this->success($res['msg'],$url);
            }else{
                $this->error($res['msg']);
            }
        }
        //所有任务
        $oldData=db('user_view')->where('vid',$id)->find();
        return view('',compact('oldData'));
    }

    /*
     * 员工删除
     */
    public function del(UserModel $user){
        $id=input('get.id');
        $res=$user->del($id);
        if ($res['valid']){
            $this->success($res['msg'],'index');
        }else{
            $this->error($res['msg']);
        }
    }
}
