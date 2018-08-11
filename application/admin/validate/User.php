<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/12/20
 * Time: 13:38
 */

namespace app\admin\validate;
use think\Validate;

Class User extends Validate{
    //验证规则
    protected $rule=[
        'name'=>'require'
    ];
    //提示消息
    protected $message=[
        'name.require'=>'请填写员工名称'
    ];
}