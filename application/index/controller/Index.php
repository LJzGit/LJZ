<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 21:26
 */
namespace app\index\controller;

use think\Controller;
class Index extends Controller{

    public function index(){

        return $this->fetch('yimi_index');
    }
}