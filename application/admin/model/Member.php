<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:43
 */
namespace app\admin\model;
use think\Model;
use think\Controller;
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
    /**
     * 获取会员信息
     */
    static public function getMember(){
        $data=db('member')->paginate(3);
        return $data;
    }

    static public function delMember($id){
        $res=db('member')->delete($id);
        return $res?true:false;
    }
    /**
     * 通过id获取会员信息
     */
    static public function getMemberById($id){
        $data=db('member')->find($id);
        return $data;
    }

    /*
     * 修改会员信息
     */
    static public function edit($data){
        $res=db('member')->update($data);
        return $res;
    }

    /**
     * 冻结会员
     */
    static public function is_lock($data){
        $res=db('member')->update($data);
        return $res?true:false;
    }
}