<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/26
 * Time: 11:24
 */
namespace app\index\validate;

use think\Validate;

class Register extends Validate {

    protected $rule = [
        'username'  =>  'require|max:25|unique:member',
        'password' =>  'require|min:6|max:20',
        'mobile'=>'require|number|max:11|min:11|unique:member',
    ];

    protected $message  =   [
        'username.require' => '用户名不能为空',
        'username.max'     => '用户名最多不能超过25个字符',
        'username.unique'     => '用户名已存在',
        'password.require'  => '密码不能为空',
        'password.min'  => '密码至少6位',
        'password.max'     => '密码最多不能超过20个字符',
        'mobile.number'  => '手机号输入有误',
        'mobile.max'  => '手机号输入有误',
        'mobile.min'  => '手机号输入有误',
        'mobile.require'  => '手机号不能为空',
        'mobile.unique'  => '手机号已存在',
    ];

    protected $scene = [
        'regs'  =>  ['password','mobile'],
        'add'  =>  ['username','password','mobile'],
        'edit'  =>  ['username','mobile'],
    ];
}