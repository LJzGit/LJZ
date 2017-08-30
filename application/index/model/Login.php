<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 22:04
 */
namespace app\index\model;

use think\Model;
class Login extends Model{
    /**
     * 获取会员信息
     */
    static public function getMember($data){
        $arr=db('member')->where(['username'=>$data['username']])->find();
        return $arr;
    }

}