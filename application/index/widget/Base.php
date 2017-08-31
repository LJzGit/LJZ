<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 14:50
 */

namespace app\index\widget;
use think\Controller;
class Base extends Controller{

    public function header(){

        return $this->fetch('common\header');
    }

    public function footer(){

        return $this->fetch('common\footer');
    }
}