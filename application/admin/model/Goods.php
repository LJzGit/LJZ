<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 21:21
 */

namespace app\admin\model;
use think\Model;
use app\admin\model\Cate;

class Goods extends Model{
    /**
     * 获取分类
     */
    static public function getCate(){
        $cate=db('cate')->order('path')->select();
        foreach ($cate as $key=>$val){
            $cate[$key]['name'] = str_repeat('—',$val['level']).$val['name'];
        }
        return $cate;
    }
    /**
     * 添加商品
     */
    static public function addGoods($data){
        $res=db('goods')->insert($data);
        return $res?true:false;
    }
    /**
     * 找商品信息
     */
    static public function getGoods(){
        $data=db('goods')
            ->alias('g')
            ->field('g.goods_id,g.goods_name,g.sell_price,g.cate_id,g.market_price,g.store,g.is_up,g.is_show,g.last_time,c.id,c.name,i.img_s_url')
            ->join('cate c','g.cate_id=c.id','left')
            ->join('image i','g.goods_id=i.goods_id','left')
            ->paginate(3);
//       dump($data);exit;
       return $data;
    }

    /**
     * 删除商品
     */
    static public function delGoodsById($id){
       $data = db('goods')->find($id);
       if($data['is_show']==0){
           $data['is_show']=1;
           db('goods')->update($data);
           return false;
       }else{
           $data['is_show']=0;
           db('goods')->update($data);
           return true;
       }
    }
    /**
     * 通过id找信息
     */
    static public function getGoodsById($id){
        $data=db('goods')
            ->alias('g')
            ->field('g.goods_id,g.goods_name,g.sell_price,g.cate_id,g.market_price,g.point,g.desc,g.content,g.store,g.is_up,g.is_show,g.last_time,c.id,c.name')
            ->join('cate c','g.cate_id=c.id','left')
            ->find($id);
        return $data;
    }
    /**
     * 更新商品数据
     */
    static public function updateGoods($data){
        $arr['goods_id']=$data['id'];
        $arr['goods_name']=$data['goods_name'];
        $arr['sell_price']=$data['sell_price'];
        $arr['market_price']=$data['market_price'];
        $arr['point']=$data['point'];
        $arr['desc']=$data['desc'];
        $arr['content']=$data['content'];
        $arr['store']=$data['store'];
        $arr['is_up']=$data['is_up'];
        $arr['last_time']=$data['last_time'];
        $arr['cate_id']=$data['cate_id'];
        //更新
        $res=db('goods')->update($arr);
        return $res?true:false;
    }
}