<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 20:39
 */
namespace app\admin\controller;
use app\admin\model\Goods as goodsModel;
use app\admin\widget\Blog;

class Goods extends Blog{

    public function index(){

        $data=goodsModel::getGoods();
        $this->assign('data',$data);
        return $this->fetch('list');
    }
    /**
     * 添加商品
     */
    public function add(){
        if (request()->isPost()) {
            $data = [
                'goods_name' => input('goods_name'),
                'cate_id' => input('cate_id'),
                'market_price' => input('market_price'),
                'sell_price' => input('sell_price'),
                'store' => input('store'),
                'desc' => input('desc'),
                'point' => input('point'),
                'content' => input('content'),
                'last_time' => time()
            ];
            //判断是否上架
            if(input('is_up')=='on'){
                $data['is_up']=1;
            }else{
                $data['is_up']=0;
            }
            //验证
            $valitate = validate('Goods');
            if (!$valitate->scene('add')->check($data)) {
                return $this->error($valitate->getError());
            }

//            dump($arr[0]);
//            dump($_FILES['file']['type']);exit;
            //判断是否有图片上传
//            if($_FILES['file']['tmp_name']){
//                //上传图片
//                // 获取表单上传文件 例如上传了001.jpg
//                $file = request()->file('file');
//                //判断上传的是否是图片
//                $arr=$_FILES['file']['type'];
//                $arr=explode('/',$arr);
//                if($arr[0]!='image'){
//                    return $this->error('请上传图片！');
//                }
//                // 移动到框架应用根目录/public/uploads/ 目录下
//                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//                if($info){
//                    // 成功上传后 获取上传信息
//                    // 输出 jpg
////                    echo $info->getExtension();
////                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
////                    echo $info->getSaveName();
////                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
////                    echo $info->getFilename();
//                    //生成图片路径名
//                    $filename='/uploads/'.$info->getSaveName();
//                    $filename=str_replace('\\','/',$filename);
//                    //把图片放进数组
//                    $data['pic']=$filename;
//                }else{
//                    // 上传失败获取错误信息
//                    return $this->error($file->getError());
//                }
//            }

            //添加数据
            $res = goodsModel::addGoods($data);
            if ($res) {
                return $this->success('添加成功', 'Goods/index');
            } else {
                return $this->error('添加失败');
            }
        }

        $data=goodsModel::getCate();
        $this->assign('data',$data);
        return $this->fetch();
    }
    /**
     * 删除商品
     */
    public function del(){
        $id=input('id');
        $res=goodsModel::delGoodsById($id);
        if ($res==1) {
            return $this->success('删除成功', 'index');
        } else {
            return $this->success('撤销删除成功', 'index');
        }
    }
    /**
     * 修改商品
     */
    public function edit(){
        $id=input('id');
        $data=goodsModel::getGoodsById($id);
//        dump($data);exit;
        $this->assign('data',$data);
        $cate=goodsModel::getCate();
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    /**
     * 执行修改商品
     */
    public function doEdit(){
        $data=[
            'id'=>input('id'),
            'goods_name' => input('goods_name'),
            'cate_id' => input('cate_id'),
            'market_price' => input('market_price'),
            'sell_price' => input('sell_price'),
            'store' => input('store'),
            'desc' => input('desc'),
            'point' => input('point'),
            'content' => input('content'),
//            'is_up' => input('is_up'),
            'last_time' => time()

        ];
        if(input('is_up')=='on'){
           $data['is_up']=1;
        }else{
            $data['is_up']=0;
        }
//        dump($data);exit;
        $res=goodsModel::updateGoods($data);
        if ($res) {
            return $this->success('修改成功', 'index');
        } else {
            return $this->error('修改失败');
        }
    }

}