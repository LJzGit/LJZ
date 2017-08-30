<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 14:58
 */

namespace app\admin\model;
use think\Model;

class Picture extends Model{
    /**
     * 查找商品信息
     */
    static public function getGoods(){
        $data=db('goods')->select();
        return $data;
    }

    /**
     * 上传图片
     */
    static public function upload($file)
    {
        $response = [
            'status' => 'error',
            'msg' => ''
        ];
        if ($_FILES['file']['tmp_name']) {
            $file = request()->file('file');
//            dump($file);exit;
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                // 成功上传后 获取上传信息
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $image_url = $info->getSaveName();
                $image_url = '/uploads/' . str_replace('\\', '/', $image_url);
                $response['status'] = 'success';
                $response['msg'] = '上传成功';
                $response['imager_url'] = $image_url;
                return $response;
            } else {
                // 上传失败获取错误信息
                $response['msg'] = $file->getError();
                return $response;
            }
        }
    }
    /**
     * 缩放图片
     */
    static public function thumb($url,$width=120,$height=120){
        $image=\think\Image::open('./'.$url);
        $dir_name=dirname($url);//目录名
        $file_name=basename($url);//文件名
        $save_name=$dir_name.'/'.$width.'_'.$file_name;
        $ressult=$image->thumb($width,$height)->save('.'.$save_name);
        if(!$ressult){
            return false;
        }
        return $save_name;
    }

    /**
     * 插入图片数据
     */
    static public function addImage($data){
        $res=db('image')->insert($data);
        return $res?true:false;
    }
    /**
     * 找图通过id
     */
    static public function getImageById($id){
//        dump($id);exit;
        $map['g.goods_id']=$id;
        $data=db('image')
            ->alias('i')
            ->field('i.img_url,i.goods_id,g.goods_name')
            ->join('goods g','i.goods_id=g.goods_id','left')
            ->where($map)
            ->select();
        return $data;
    }
}