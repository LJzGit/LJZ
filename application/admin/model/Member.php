<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:43
 */
namespace app\admin\model;
use think\Model;

class Member extends Model{
    static public function addMember($data){
        $data=[
            'username'=>input('username'),
            'mobile'=>input('mobile'),
            'password'=>md5(input('password')),
        ];
        $res=db('member')->insert($data);
        return $res;
    }
}