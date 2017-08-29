<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 8:59
 */
namespace app\admin\controller;

use app\admin\widget\Blog;
use app\admin\model\Member as memberModel;
class member extends Blog{

    public function index(){

        return $this->fetch('list');
    }
    //添加会员
    public function add(){
        if(request()->isPost()){
            $data=[
                'username'=>input('username'),
                'mobile'=>input('mobile'),
                'password'=>md5(input('password')),
            ];

            //验证
            $validate=validate('Member');
            if(!$validate->scene('add')->check($data)){
                return $this->error($validate->getError());
            }
            $res=memberModel::addMember($data);
            if($res){
                return $this->success("添加成功~",url('index'));
            }else{
                return $this->error('添加失败！');
            }
        }
        return $this->fetch();
    }

}