<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 20:42
 */
namespace app\admin\controller;

use think\Controller;

class Login extends Controller {

    public function index(){
        return $this->fetch('login');
    }

    public function login(){
        $data=[
            'username'=>input('username'),
            'password'=>input('password'),
            'code'=>input('code'),
            'is_lock'=>input('is_lock'),
        ];


        if($data['username']==''||!$data['username']){
            return $this->error('用户名不能为空');
        }
        if($data['password']==''||!$data['password']){
            return $this->error('密码不能为空');
        }
        if($data['code']==''||!$data['code']){
            return $this->error('验证码不能为空');
        }

        if(!captcha_check($data['code'])){
            return $this->error('验证码错误');
        }
        $arr=db('manager')->where(['username'=>$data['username']])->find();

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