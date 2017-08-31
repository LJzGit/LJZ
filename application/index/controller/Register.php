<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 14:56
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Register as regsModel;
class Register extends Controller{

    public function index(){
        return $this->fetch('yimi_register');
    }

    public function regs(){
        $password2=input('password2');
        $code=input('code');
        $data=[
            'mobile'=>input('mobile'),
            'password'=>input('password'),
            'reg_time'=>time()
        ];
        if($data['password']!==$password2){
            return $this->error('两次密码输入不一致,请重试');
        }
        $validate=validate('Register');
        if(!$validate->scene('regs')->check($data)){
            return $this->error($validate->getError());
        }
        $data['password']=md5($data['password']);
        $data['ip']=gethostbyname(getenv("HTTP_CLIENT_IP"));
        $data['username']=$data['mobile'];
        $res=regsModel::regs($data);
        if($res){
            return $this->success('注册成功！',url('Login/index'));
        }else{
            return $this->error('注册失败！');
        }
    }
}