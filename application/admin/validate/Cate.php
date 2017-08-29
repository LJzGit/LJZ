<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 14:36
 */

namespace app\admin\validate;

use think\Validate;

class Cate extends Validate {

    protected $rule = [
        'name'  =>  'require|max:25|unique:cate',
    ];

    protected $message  =   [
        'name.require' => '分类名不能为空',
        'name.max'     => '分类名最多不能超过25个字符',
        'name.unique'     => '分类名已存在',
    ];

    protected $scene = [
        'add'  =>  ['name'],
        'edit'  =>  ['name'],
    ];
}