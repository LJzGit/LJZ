<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 14:11
 */
namespace app\admin\model;
use think\paginator;
use think\Model;

class Cate extends Model{
    /**
     * 查找数据
     */
    static public function cateData(){
        $data=db('cate')->order('path')->paginate(5);
        $page=$data->render();
        $arr=$data->all();
        foreach ($arr as $key=>$val){
            $arr[$key]['name'] = str_repeat('—',$val['level']).$val['name'];
        }
        return [
            'data'=>$arr,
            'page'=>$page
        ];
    }

    /**
     * 添加顶级分类数据
     */
    static public function addTopCate($name){
        $id=db('cate')->insertGetId($name);
        if(!$id){
            return false;
        }
        $path=$id;
        $res=db('cate')->update([
            'id'=>$id,
            'path'=>$path
        ]);
        return $res?true:false;
    }

    /*
     * 通过id找分类
     */
    static public function getCateById($id){
        if(!$id){
            return false;
        }
        $data=db('cate')->find($id);
        return $data;
    }

    /**
     *添加子分类
     */
    static public function addSonCate($data){
        $arr=self::getCateById($data['id']);
        if(!$arr ||empty($arr)){
            return false;
        }

       $pid=$data['id'];
       $name=$data['name'];
       $level=$arr['level']+1;
       $param=[
           'pid'=>$pid,
           'name'=>$name,
           'level'=>$level
       ];

       //添加
        $id=db('cate')->insertGetId($param);
        if(!$id){
            return false;
        }
        $path=$arr['path'].','.$id;
        $res=db('cate')->update(
            [
                'id'=>$id,
                'path'=>$path
            ]
        );
        return $res?true:false;
    }
    /**
     * 通过id查找表中pid
     */
    static public function getPidById($id){
        $map['pid']=$id;
        $reslut=db('cate')->field('id')->where($map)->select();
        return $reslut?true:false;

    }
    /**
     * 删除子分类
     */
    static public function delSonCate($id){
        $res=db('cate')->delete($id);
        return $res?true:false;
    }
    /**
     * 修改分类名
     */
   static public function editCate($data){
       $arr=self::getCateById($data['id']);
       $arr['name']=$data['name'];
       $res=db('cate')->update($arr);
       return $res?true:false;
   }

    /**
     * 获取分类
     */
    static public function getCate(){
        $cate=db('cate')->field('id,name,level')->order('path')->select();
        foreach ($cate as $key=>$val){
            $cate[$key]['name'] = str_repeat('—',$val['level']).$val['name'];
        }
        return $cate;
    }
}