<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/12/20
 * Time: 13:38
 */

namespace app\admin\validate;
use think\Validate;

Class Plan extends Validate{
    //验证规则
    protected $rule=[
        'title'=>'require',
        'person'=>'require'
    ];
    //提示消息
    protected $message=[
        'title.require'=>'请填写任务名称',
        'person.require'=>'请选择责任人'
    ];
}