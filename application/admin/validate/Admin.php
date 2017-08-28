<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/26
 * Time: 11:24
 */
namespace app\admin\validate;

use think\Validate;

class Admin extends Validate {

    protected $rule = [
        'username'  =>  'require|max:25|unique:manager',
        'password' =>  'require',
    ];

    protected $message  =   [
        'username.require' => '用户名不能为空',
        'username.max'     => '用户名最多不能超过25个字符',
        'username.unique'     => '用户名已存在',
        'password.require'  => '密码不能为空',
    ];

    protected $scene = [
        'add'  =>  ['username','password'],
        'edit'  =>  ['username'],
    ];
}