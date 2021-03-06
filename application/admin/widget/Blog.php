<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 18:54
 */

namespace app\admin\widget;
use think\Controller;

class Blog extends Controller{
    //公共头部
    public function header(){
        return $this->fetch('common/header');
    }
    //公共左部
    public function left(){
        return $this->fetch('common/left');
    }

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->isLogin();
    }
    public function logout(){
        session('admin',null);
        return $this->redirect('Login/index');
    }

    public function isLogin(){
        $admin=session('admin');
        if(!isset($admin) || !$admin['id']){
            return $this->error('请先登录！','Login/index');
        }
    }

}