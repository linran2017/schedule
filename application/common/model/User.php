<?php

namespace app\common\model;

use think\Model;
class User extends Model{
    protected $table='po_user_view';
    protected $pk='vid';

    /*
     * 员工添加
     */
    public function store($data){

        $name=db('user_view')->where('name',$data['name'])->find();
        if($name){
            return ['valid'=>0,'msg'=>'员工不得重复添加'];
        }
        //halt($data['num']);
        $restul=$this->validate(true)->allowField(true)->save($data);
        if($restul){
            return ['valid'=>1,'msg'=>'添加成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /*
     * 员工编辑
     */
    public function edit($data){
      // halt($data);
        $name=db('user_view')->where('name',$data['name'])
            ->where("vid!={$data['vid']}")->find();
        if($name){
            return ['valid'=>0,'msg'=>'员工不得重复添加'];
        }
        //halt($data['num']);
        $restul=$this->validate(true)->allowField(true)->save($data,[$this->pk=>$data['vid']]);
        if($restul){
            return ['valid'=>1,'msg'=>'保存成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /*
     * 分配任务处理
     */
 /*   private function task($data){
       // halt($data);
        $task=[];
        if(isset($data['title'])){
            foreach ($data['title'] as $k=>$v){
                $task[$k]['title']=$v;
            }
        }
       if(isset($data['num'])){
           foreach ($data['num'] as $k=>$v){
               $task[$k]['num']=$v;
           }
       }
        if(isset($data['fromday'])){
            foreach ($data['fromday'] as $k=>$v){
                $task[$k]['fromday']=$v;
            }
        }
        if(isset($data['today'])){
            foreach ($data['today'] as $k=>$v){
                $task[$k]['today']=$v;
            }
        }
        if(isset($data['note'])){
            foreach ($data['note'] as $k=>$v){
                $task[$k]['note']=$v;
            }
        }

        return $task;
    }*/

    /*
     * 员工删除
     */
    public function del($id){
        $duty=db('plan')->where('uid',$id)->find();
        if($duty){
            return ['valid'=>0,'msg'=>'该员工下还有任务，不能直接删除'];
        }
        if(self::destroy($id)){
            return ['valid'=>1,'msg'=>'删除成功'];
        }
    }
}
