<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 14:49
 */
namespace app\admin\controller;

use app\admin\widget\Blog;
use app\admin\model\Picture as picModel;
use app\admin\model\Goods;

class Picture extends Blog{

    public function index(){
        $res=Goods::getGoods();
        $this->assign('data',$res);
        return $this->fetch('list');
    }

    public function add(){
        $id=input('id');
        $data=Goods::getGoodsById($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function addImage(){
        $id=input('id');
        $file=input('file');
//        dump($_FILES);exit;
        $pic=picModel::upload($file);
        $data['img_url']=$pic['imager_url'];
        $data['goods_id']=$id;
        $data['img_m_url']=picModel::thumb($data['img_url'],120,120);
        $data['img_s_url']=picModel::thumb($data['img_url'],60,60);
        $data['img_b_url']=picModel::thumb($data['img_url'],200,200);
        $add=picModel::addImage($data);
        if ($add) {
            return $this->success('添加成功', 'index');
        } else {
            return $this->error('添加失败');
        }
    }

    public function edit(){
        $id=input('id');
        $data=picModel::getImageById($id);
        dump($data);exit;
//        $data=$data[0];
        $this->assign('data',$data);
        return $this->fetch();
    }
}