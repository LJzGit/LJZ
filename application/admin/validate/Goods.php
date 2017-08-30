<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 14:36
 */

namespace app\admin\validate;

use think\Validate;

class Goods extends Validate {

    protected $rule = [
        'goods_name'  =>  'require|max:25|unique:goods',
    ];

    protected $message  =   [
        'goods_name.require' => '商品名不能为空',
        'goods_name.max'     => '商品名最多不能超过25个字符',
        'goods_name.unique'     => '商品已存在',
    ];

    protected $scene = [
        'add'  =>  ['goods_name'],
        'edit'  =>  ['goods_name'],
    ];
}