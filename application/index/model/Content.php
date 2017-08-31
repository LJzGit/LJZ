<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 19:57
 */
namespace app\index\model;
use think\Model;

class Content extends Model{
    /**
     * 获取商品信息和图片
     */
    static public function GetGoodsAndImg($id){
        $data=db('goods')
            ->alias('g')
            ->field('g.goods_name,g.sell_price,g.desc,g.content,g.is_up,i.img_b_url,i.img_s_url')
            ->join('image i','g.goods_id=i.goods_id','left')
            ->where(['i.goods_id'=>$id])
            ->select();
//            dump($data);exit;
        return $data;
    }

}