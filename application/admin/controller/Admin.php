<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 18:47
 */
namespace app\admin\controller;
use app\admin\widget\Blog;

class Admin extends Blog {

    public function index(){
        $data=db('manager')->paginate(3);
        $this->assign('data',$data);

        return $this->fetch('list');
    }
    /**
     * 添加管理员
     */
    public function add(){
        if(request()->isPost()){
            $data=[
                'username'=>input('username'),
                'password'=>md5(input('password')),
            ];

            //验证
            $validate=validate('Admin');
            if(!$validate->scene('add')->check($data)){
                return $this->error($validate->getError());
            }
            $res=db('manager')->insert($data);
            if($res){
                return $this->success("添加成功~",url('index'));
            }else{
                return $this->error('添加失败！');
            }
        }

        return $this->fetch();
    }
    /**
     * 编辑管理员（显示）
     */
    public function edit(){
        $id=input('id');
        $data=db('manager')->find($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 编辑管理员（保存）
     */
    public function doEdit(){
        $password=input('password');
        $data=[
            'id'=>input('id'),
            'username'=>input('username'),
        ];
        if($password != ''){
            $data['password']=md5($password);
        }
        //验证
        $validate=validate('Admin');
        if(!$validate->scene('edit')->check($data)){
            return $this->error($validate->getError());
        }

        $res=db('manager')->update($data);
        if($res!==false){
            return $this->success("修改成功",url('admin/index'));
        }else{
            return $this->error('修改失败');
        }

    }

    /**
     * 冻结管理员
     */
    public function is_lock(){
        $data=[
            'id'=>input('id')
        ];
        if($data['id']=='1'){
            return $this->error('超级管理员不能冻结');
        }
        $lock=db('manager')->find($data['id']);
        if($lock['is_lock']=='on'){
            $data['is_lock']=1;
            db('manager')->update($data);
            return $this->success('冻结成功',url('index'));
        }else{
            $data['is_lock']=0;
            db('manager')->update($data);
            return $this->success('解冻成功',url('index'));
        }
    }
    /**
     * 删除管理员
     */
    public function del(){
        $id=input('id');
        if($id=='1'){
            return $this->error('超级管理员不能删除');
        }
        $res=db('manager')->delete($id);
        if($res){
            return $this->success('删除成功~',url('index'));
        }else{
            return $this->error('删除失败！');
        }
    }
}