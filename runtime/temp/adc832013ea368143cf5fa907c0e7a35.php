<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\UPUPW\UPUPW_NP7.0\htdocs\yimi\public/../application/admin\view\picture\edit.html";i:1504099454;}*/ ?>
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
                    <li>
                        <a href="<?php echo url('Picture/index'); ?>">图片列表</a>
                    </li>
                    <li class="active">管理图片</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '<?php echo url('Admin/add'); ?>'"><i class="fa fa-plus"></i>
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
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data as $val): ?>
                                        <tr>
                                            <?php foreach($val as $v): ?>
                                            <td align="center"><?php echo $val.$v['goods_id']; ?></td>
                                            <td align="center"><?php echo $v['goods_name']; ?></td>
                                            <td align="center"><img src="<?php echo $v['img_url']; ?>" width="120" alt=""></td>
                                            <td align="center">
                                                <a href="<?php echo url('Picture/edit',['id'=>1]); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-cogs"></i> 管理
                                                </a>

                                            </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>

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