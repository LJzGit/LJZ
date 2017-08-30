<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\UPUPW\UPUPW_NP7.0\htdocs\yimi\public/../application/admin\view\goods\list.html";i:1504082899;}*/ ?>
<?php echo widget('Blog/header'); ?>

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <?php echo widget('Blog/left'); ?>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo url('Index/index'); ?>">系统</a>
                    </li>
                    <li class="active">商品管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '<?php echo url('Goods/add'); ?>'"><i class="fa fa-plus"></i>
                    Add
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">商品名称</th>
                                            <th class="text-center">缩略图</th>
                                            <th class="text-center">售价</th>
                                            <th class="text-center">进价</th>
                                            <th class="text-center">所属分类</th>
                                            <th class="text-center">上架时间</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data as $v): ?>

                                        <tr>
                                            <td align="center"><?php echo $v['goods_id']; ?></td>
                                            <td align="center"><?php echo $v['goods_name']; ?></td>
                                            <td align="center"><img src="<?php echo $v['img_s_url']; ?>" alt=""></td>
                                            <td align="center"><?php echo $v['sell_price']; ?></td>
                                            <td align="center"><?php echo $v['market_price']; ?></td>
                                            <td align="center"><?php echo $v['name']; ?></td>
                                            <td align="center"><?php echo date("Y-m-d h-i-s",$v['last_time']); ?></td>
                                            <td align="center">
                                                <a href="<?php echo url('Goods/edit',['id'=>$v['goods_id']]); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="<?php echo url('Picture/add',['id'=>$v['goods_id']]); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-picture-o"></i> 添加图片
                                                </a>
                                                <a href="#"
                                                   onClick="warning('确实要删除吗', '<?php echo url('Goods/del',['id'=>$v['goods_id']]); ?>')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除/撤销删除
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                                <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="__STATIC__/admin/style/jquery_002.js"></script>
<script src="__STATIC__/admin/style/bootstrap.js"></script>
<script src="__STATIC__/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="__STATIC__/admin/style/beyond.js"></script>


</body></html>