<?php

namespace app\common\model;

use think\Model;

class Plan extends Model{
    protected $table='po_plan';
    protected $pk='id';

    /*
     * 计划添加
     */
    public function store($data){
        $name=db('plan')->where('title',$data['title'])
            ->where('well',1)->find();
        if($name){
            return ['valid'=>0,'msg'=>'计划不能重复添加'];
        }
        $startmonth=date('y-m',strtotime($data['startdate']));
        $endmonth=date('y-m',strtotime($data['enddate']));
        $startday=date('d',strtotime($data['startdate']));
        $endday=date('d',strtotime($data['enddate']));
        //halt($start);
        if($startmonth!==$endmonth){
            return ['valid'=>0,'msg'=>'开始时间和结束时间必须在一个月内'];
        }
        if($startday>$endday){
            return ['valid'=>0,'msg'=>'开始时间不得大于结束时间'];
        }
        $result=$this->validate(true)->save($data);
        if($result){
            return ['valid'=>1,'msg'=>'添加成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /*
     * 计划编辑
     */
    public function edit($data){
        $title=db('plan')->where('title',$data['title'])
            ->where("id!={$data['id']}")
            ->where('well',1)->find();
        if($title){
            return ['valid'=>0,'msg'=>'计划不能重复添加'];
        }
        $startmonth=date('y-m',strtotime($data['startdate']));
        $endmonth=date('y-m',strtotime($data['enddate']));
        $startday=date('d',strtotime($data['startdate']));
        $endday=date('d',strtotime($data['enddate']));
        //halt($start);
        if($startmonth!==$endmonth){
            return ['valid'=>0,'msg'=>'开始时间和结束时间必须在一个月内'];
        }
        if($startday>$endday){
            return ['valid'=>0,'msg'=>'开始时间不得大于结束时间'];
        }
        $result=$this->validate(true)->allowField(true)->save($data,[$this->pk=>$data['id']]);
        if($result){
            return ['valid'=>1,'msg'=>'保存成功'];
        }else{
            return ['valid'=>0,'msg'=>$this->getError()];
        }
    }

    /*
     * 计划删除
     */
    public function del($id){
        if(self::destroy($id)){
            return ['valid'=>1,'msg'=>'删除成功'];
        }
    }
}
