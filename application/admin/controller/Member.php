<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 8:59
 */
namespace app\admin\controller;

use app\admin\widget\Blog;
use app\admin\model\Member as memberModel;
class member extends Blog{

    public function index(){
        $data=memberModel::getMember();
        $this->assign('data',$data);
        return $this->fetch('list');
    }
    //添加会员
    public function add(){
        if(request()->isPost()){
            $data=[
                'username'=>input('username'),
                'mobile'=>input('mobile'),
                'password'=>md5(input('password')),
            ];

            //验证
            $validate=validate('Member');
            if(!$validate->scene('add')->check($data)){
                return $this->error($validate->getError());
            }
            $res=memberModel::addMember($data);
            if($res){
                return $this->success("添加成功~",url('index'));
            }else{
                return $this->error('添加失败！');
            }
        }
        return $this->fetch();
    }

    /**
     * 删除会员
     */
    public function del(){
        $id=input('id');
        $res=memberModel::delMember($id);
        if($res){
            return $this->success("删除成功~",url('index'));
        }else{
            return $this->error('删除失败！');
        }
    }

    /**
     * 修改会员信息
     */
    public function edit(){
        $id=input('id');
        $data=memberModel::getMemberById($id);
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 执行修改
     */
    public function doEdit(){
        $password=input('password');
        $data=[
            'username'=>input('username'),
            'mobile'=>input('mobile'),
            'member_id'=>input('id')
        ];
        if($password != ''){
            $data['password']=md5($password);
        }
        $validate=validate('Member');
        if(!$validate->scene('edit')->check($data)){
            return $this->error($validate->getError());
        }
        $res=memberModel::edit($data);

        if($res!== false){
            return $this->success("修改成功~",url('index'));
        }else{
            return $this->error('修改失败！');
        }
    }
    /**
     * 冻结会员
     */
    public function is_lock(){
        $data=[
            'member_id'=>input('id')
        ];

        $lock=db('member')->find($data['member_id']);

        if($lock['is_lock']==0){
            $data['is_lock']=1;
            $res=memberModel::is_lock($data);
           if($res){
               return $this->success('冻结成功',url('index'));
           }

        }else{
            $data['is_lock']=0;
            $res=memberModel::is_lock($data);
            if($res){
                return $this->success('解冻成功',url('index'));
            }
        }
    }
}