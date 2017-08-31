<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 14:39
 */

namespace app\index\controller;
use app\index\model\Content as contModel;
use app\index\widget\Base;
use think\Controller;
class Content extends Base {
    public function index(){
        $id=input('id');
        $data=contModel::GetGoodsAndImg($id);
        $this->assign('data',$data);
        $this->assign('data0',$data[0]);
        return $this->fetch('yimi_content');
    }

}