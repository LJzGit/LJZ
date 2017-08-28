<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 18:41
 */

namespace app\admin\controller;

use app\admin\widget\Blog;

class Index extends Blog {

    public function index(){
        return $this->fetch();
    }
}