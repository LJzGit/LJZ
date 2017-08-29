<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\UPUPW\UPUPW_NP7.0\htdocs\yimi\public/../application/admin\view\member\list.html";i:1503969048;}*/ ?>
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
                    <li class="active">会员管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="添加会员" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '<?php echo url('Member/add'); ?>'"><i class="fa fa-plus"></i>
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
                                            <th class="text-center">会员名称</th>
                                            <th class="text-center">手机号</th>
                                            <th class="text-center">IP</th>
                                            <th class="text-center">注册时间</th>
                                            <th class="text-center">积分</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td align="center">1</td>
                                            <td align="center">1</td>
                                            <td align="center">1</td>
                                            <td align="center">1</td>
                                            <td align="center">1</td>
                                            <td align="center">1</td>
                                            <td align="center">
                                                <a href="<?php echo url('Admin/edit',['id'=>1]); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="<?php echo url('Admin/is_lock',['id'=>1]); ?>"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-frown-o"></i> 冻结
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '<?php echo url('Admin/del',['id'=>1]); ?>')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>

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