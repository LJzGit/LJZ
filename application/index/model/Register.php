<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 15:27
 */
namespace app\index\model;
use think\Model;
class Register extends Model{

    static public function regs($data){
        $res=db('member')->insert($data);

        return $res?true:false;
    }
}