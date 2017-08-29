<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:59
 */
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\widget\Blog;

class Cate extends Blog{
    /**
     * @return mixed
     * 显示数据
     */
    public function index(){
        $data=CateModel::cateData();
        $this->assign('data',$data);
        return $this->fetch('list');
    }
    /**
     * 添加顶级分类
     */
    public function topCate(){

        return $this->fetch('topcate');
    }
    public function addTopCate(){
        $data=[
            'name'=>input('name')
        ];
        //验证
        $validate=validate('Cate');
        if(!$validate->scene('add')->check($data)){
            return $this->error($validate->getError());
        }
        $data=CateModel::addTopCate($data);
        if($data==1){
            return $this->success('添加成功',url('index'));
        }else{
            return $this->error('添加失败');
        }
    }

    /**
     * 获取所属分类
     */
    public function sonCate(){
        $id=input('id');
        $data=CateModel::getCateById($id);
        $this->assign('data',$data);
        return $this->fetch('soncate');
    }

    /**
     * 添加子级分类
     */
    public function addSonCate(){
        //验证
        $data=[
            'id'=>input('id'),
            'name'=>input('name')
        ];
        $validate=validate('Cate');
        if(!$validate->scene('add')->check($data)){
            return $this->error($validate->getError());
        }
        $res=CateModel::addSonCate($data);
//        dump($data);exit;
        if($res){
            return $this->success('添加成功',url('index'));
        }else{
            return $this->error('添加失败');
        }
    }
    /**
     * 删除分类
     */
    public function del(){
        $id=input('id');
        $res=CateModel::getPidById($id);
        if($res){
           return $this->error('含有子分类，无法删除');
        }
        $reslut=CateModel::delSonCate($id);
        if($reslut){
            return $this->success('删除成功',url('index'));
        }else{
            return $this->error('删除失败');
        }
    }
    /**
     * 修改分类名
     */
    public function edit(){
        $id=input('id');
        $data=CateModel::getCateById($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 执行修改
     */
    public function doEdit(){
        $data=[
            'id'=>input('id'),
            'name'=>input('name')
        ];
        $reslut=CateModel::editCate($data);
        if($reslut!==1){
            return $this->success('修改成功',url('index'));
        }else{
            return $this->error('修改失败');
        }
    }
}