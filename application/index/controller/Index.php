<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 21:26
 */
namespace app\index\controller;

use app\index\widget\Base;
use think\Controller;
class Index extends Base {

    public function index(){

        return $this->fetch('yimi_index');
    }
}