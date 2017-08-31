<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 21:53
 */
namespace app\index\controller;
use app\index\widget\Base;
use think\Controller;
use app\index\model\Login as loginModel;
class Login extends Base {

    public function index(){
        return $this->fetch('yimi_login');
    }

    public function login(){
        if(request()->isPost()){
            $data=[
                'username'=>input('username'),
                'password'=>input('password'),
            ];
            if($data['username']==''||!$data['username']){
                return $this->error('用户名不能为空');
            }
            if($data['password']==''||!$data['password']){
                return $this->error('密码不能为空');
            }
            $arr=loginModel::getMember($data);

            if($arr['is_lock']=='1'){
                return $this->error('此帐号已被冻结');
            }
            if(!$arr){
                return $this->error('用户名或密码错误');
            }
            if($arr['password'] != md5($data['password'])){
                return $this->error('用户名或密码错误');
            }
            session('admin',$arr);
            return $this->success('登录成功,正在跳转。。。','Index/index');
        }

    }
}